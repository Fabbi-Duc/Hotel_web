<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TimeSheetPm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timeSheetPm:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $users = User::where('shift', 2)->select('id')->get();

            $arr = [];
            foreach($users as $user) {
                $arr[] = [
                    'user_id' => $user->id,
                    'day' => now()
                ];
            }

            DB::table('timesheet')->insert($arr);
            
            Log::info('create timesheet am success');
        } catch (\Exception $e) {
            return Log::error($e->getMessage());
        }
    }
}
