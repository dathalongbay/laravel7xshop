<?php

namespace App\Console\Commands;

use App\Models\Backend\AdminModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class MakeAdminAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin-account {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make new admin account';

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
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        try {
            $checkExist = AdminModel::where('email', $email)->first();

            if ($checkExist) {
                $this->error("User email existed : {$email} Please try again with new other email!");
            } else {
                $admin = new AdminModel();
                $admin->name = $name;
                $admin->email = $email;
                $admin->password = Hash::make($password);
                $admin->desc = "";
                $admin->avatar = "";
                $admin->save();
                $this->info("Make admin account : {$name} email {$email} with password {$password}!");
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $this->error("Exception {$message}!");
        }

        return 0;
    }
}
