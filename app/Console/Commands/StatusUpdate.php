<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating User Profile Status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $teamL = 5;
        $groupL = 25;
        $brandM = 100;
        $seniorL = 500;
        $executiveD = 1000;
        $regionalD = 2500;
        $nationalP = 5000;
        $globalA = 10000;

        $dataUsers = DB::table('users')->get();
        foreach ($dataUsers as $user) {
            $id = $user->id;
            if ($user->point >= $teamL && $user->point < $groupL) {
                DB::table("users")
                    ->where('id', $id)
                    ->update(['rank' => 'Team Leader']);
                $this->info('Successfully Updated.');
            } elseif ($user->point >= $groupL && $user->point < $brandM) {
                DB::table("users")
                    ->where('id', $id)
                    ->update(['rank' => 'Group Leader']);
                $this->info('Successfully Updated.');
            } elseif ($user->point >= $brandM && $user->point < $seniorL) {
                DB::table("users")
                    ->where('id', $id)
                    ->update(['rank' => 'Brand Manager']);
                $this->info('Successfully Updated.');
            } elseif ($user->point >= $seniorL && $user->point < $seniorL) {
                DB::table("users")
                    ->where('id', $id)
                    ->update(['rank' => 'Senior Manager']);
                $this->info('Successfully Updated.');
            } elseif ($user->point >= $executiveD && $user->point < $regionalD) {
                DB::table("users")
                    ->where('id', $id)
                    ->update(['rank' => 'Executive Director']);
                $this->info('Successfully Updated.');
            } elseif ($user->point >= $regionalD && $user->point < $nationalP) {
                DB::table("users")
                    ->where('id', $id)
                    ->update(['rank' => 'Regional Director']);
                $this->info('Successfully Updated.');
            } elseif ($user->point >= $nationalP && $user->point < $globalA) {
                DB::table("users")
                    ->where('id', $id)
                    ->update(['rank' => 'National Director']);
                $this->info('Successfully Updated.');
            } elseif ($user->point >= $globalA) {
                DB::table("users")
                    ->where('id', $id)
                    ->update(['rank' => 'Global Ambassador']);
                $this->info('Successfully Updated.');
            } else {
                $this->info('Contact Admin');
            }
        }
    }
}
