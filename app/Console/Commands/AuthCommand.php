<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:token {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auth with console. You can login with email and password with artisan command: php artisan auth:token --email=email --password=password';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        if (Auth::attempt([
            "email" => $email,
            "password" => $password,
        ])) {
            $user = Auth::user();
            $token = $user->createToken($user->id)->plainTextToken;
            $expiresAt = now()->addMinutes(5);

            $this->info("Your token is: $token");
            $this->info("Your token expires at: $expiresAt");
        } else {
            $this->error("Invalid email or password");
        }


        return 0;

    }
}
