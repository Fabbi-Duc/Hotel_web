<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            "App\Repositories\User\UserRepositoryInterface",
            "App\Repositories\User\UserRepository"
        );

        $this->app->singleton(
            "App\Repositories\Room\RoomRepositoryInterface",
            "App\Repositories\Room\RoomRepository"
        );

        $this->app->singleton(
            "App\Repositories\Customer\CustomerRepositoryInterface",
            "App\Repositories\Customer\CustomerRepository"
        );

        $this->app->singleton(
            "App\Repositories\Auth\AuthRepositoryInterface",
            "App\Repositories\Auth\AuthRepository"
        );

        $this->app->singleton(
            "App\Repositories\HouseWare\HouseWareRespositoryInterface",
            "App\Repositories\HouseWare\HouseWareRepository"
        );

        $this->app->singleton(
            "App\Repositories\Ingredients\IngredientsRepositoryInterface",
            "App\Repositories\Ingredients\IngredientsRepository"
        );

        $this->app->singleton(
            "App\Services\Auth\AuthServiceInterface",
            "App\Services\Auth\AuthService"
        );
        $this->app->singleton(
            "App\Services\Mail\MailServiceInterface",
            "App\Services\Mail\MailService"
        );
        $this->app->singleton(
            "App\Repositories\Bills\BillsRepositoryInterface",
            "App\Repositories\Bills\BillsRepository"
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (app()->environment(['local', 'dev'])) {
            \DB::listen(
                function ($sql) {
                    foreach ($sql->bindings as $i => $binding) {
                        if ($binding instanceof \DateTime) {
                            $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                        } else {
                            if (is_string($binding)) {
                                $sql->bindings[$i] = "'$binding'";
                            }
                        }
                    }
                    // Insert bindings into query
                    $query = str_replace(['%', '?'], ['%%', '%s'], $sql->sql);

                    $query = vsprintf($query, $sql->bindings);

                    // Save the query to file
                    $logFile = fopen(
                        storage_path('logs' . DIRECTORY_SEPARATOR . date('Y-m-d') . '_query.log'),
                        'a+'
                    );
                    fwrite($logFile, date('Y-m-d H:i:s') . ': ' . $query . PHP_EOL);
                    fclose($logFile);
                }
            );
        }
    }
}
