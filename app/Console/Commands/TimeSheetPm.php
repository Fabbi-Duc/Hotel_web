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
            $list = DB::table('rooms_customers')->where('status', 1)->where('start_time', '<', getdate())->get();
            DB::table('rooms_customers')->where('status', 1)->where('start_time', '<', getdate())->update(['status' => 3]);
            foreach ($list as $list_id) {
                $room = DB::table('rooms_customers')->where('room_id', $list_id->room_id)->where('status', 2)->first();
                $room_id = DB::table('rooms_customers')->where('room_id', $list_id->room_id)->where('status', 1)->first();
                if (!$room_id && !$room) {
                    DB::table('rooms')->where('id', $list_id->room_id)->update(['status' => 1]);
                }
            }
            DB::table('timesheet')->update(['status' => 2]);
            $arr = [];
            foreach ($users as $user) {
                $arr[] = [
                    'user_id' => $user->id,
                    'day' => now(),
                    'status' => 1,
                ];
            }

            DB::table('timesheet')->insert($arr);

            Log::info('create timesheet am success');
        } catch (\Exception $e) {
            return Log::error($e->getMessage());
        }
    }
}
