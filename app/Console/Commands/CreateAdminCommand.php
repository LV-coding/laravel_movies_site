<?php

namespace App\Console\Commands;

use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{   

    protected $signature = 'createAdmin';

    protected $description = 'This is a command to create an user-admin';

    public function handle()
    {   
        $name = $this->ask('What is admin name?');
        $email = $this->ask('What is admin email?');
        $password = $this->secret('What is the password?');
        $confirm_password = $this->secret('Confirm password');

        if ($password == $confirm_password) {
            try {
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'is_admin' => 1,
                    'email_verified_at' => '2000-01-01 00:00:00',
                ]);
                $this->info('Admin created!');
            } catch(Exception $ex) {
                $this->info($ex->getMessage());
            }
        } else {
            $this->info('Password must match, try again!');
        }
    }
}
