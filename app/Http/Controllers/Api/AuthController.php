<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorType;
use App\Models\SocialAccount;
use App\Models\User;
use App\Models\Customers;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Mail\MailServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends ApiController
{
    private $authService;
    private $mailService;

    public function __construct(AuthServiceInterface $authService, MailServiceInterface $mailService)
    {
        $this->authService = $authService;
        $this->mailService = $mailService;
    }

    public function signIn(Request $request)
    {
        // Log::info("Login thanh cong");
        $result = $this->authService->signIn($request->all());
        if (!$result['success']) {
            return $this->sendError(ErrorType::CODE_4010, ErrorType::STATUS_4010);
        }

        return $this->sendSuccess($result['data']);
    }

    public function loginCustomer(Request $request)
    {
        $result = $this->authService->loginCustomer($request->all());
        if (!$result['success']) {
            return $this->sendError(ErrorType::CODE_4010, ErrorType::STATUS_4010);
        }

        return $this->sendSuccess($result['data']);
    }

    public function accountCustomer() 
    {
        $account = $this->authService->accountCustomer();

        return $this->sendSuccess($account);
    }
    public function account()
    {
        $account = $this->authService->account();

        return $this->sendSuccess($account);
    }

    public function sendMail(Request $request)
    {
        $result = $this->mailService->sendEmail("nguyentranhiep96@gmail.com", "RESET_PASSWORD", ["user" => "aaa"]);

        if (!$result["success"]) {
            return $this->sendError(ErrorType::CODE_5000, ErrorType::STATUS_5000, $result["message"]);
        }

        return $this->sendSuccess();
    }

    public function sendMultiMail(Request $request)
    {
        $result = $this->mailService->sendMultiMail(["nguyentranhiep96@gmail.com", "vanhiepbk97@gmail.com", "kieutuananh2121999@gmail.com", "mikyway212@gmail.com", "hiepnv@fabbi.io", "anhkt@fabbi.io", "longdv@fabbi.io"], "RESET_PASSWORD", ["user" => "aaa"]);

        if (!$result["success"]) {
            return $this->sendError(ErrorType::CODE_5000, ErrorType::STATUS_5000, $result["message"]);
        }

        return $this->sendSuccess();
    }

    public function loginUrl()
    {
        return $this->sendSuccess([
            'url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl()
        ]);
    }

    public function loginCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if (is_null($user)) {
            DB::beginTransaction();
            try {
                $userCreated = User::create([
                    'email' => $googleUser->email,
                    'name' => $googleUser->name
                ]);

                SocialAccount::create([
                    'user_id' => $userCreated->id,
                    'social_id' => $googleUser->getId(),
                    'social_provider' => 'google',
                    'social_name' => $googleUser->getName()
                ]);

                $token = JWTAuth::fromUser($userCreated);

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();

                throw new Exception($e->getMessage());
            }
        } else {
            SocialAccount::create([
                'user_id' => $user->id,
                'social_id' => $googleUser->getId(),
                'social_provider' => 'google',
                'social_name' => $googleUser->getName()
            ]);

            $token = JWTAuth::fromUser($user);
        }

        return $this->sendSuccess([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60
        ]);
    }
}
