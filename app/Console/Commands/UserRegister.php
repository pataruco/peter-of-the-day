<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class UserRegister extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a user as admin';

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
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is the user name?');
        $email = $this->ask('What is the user email?');
        $password = $this->secret('What is the password?');
        $retypePassword = $this->secret('Confirm password?');

        while ( $retypePassword !== $password ) {
            $this->error('Passwords do not match');
            $retypePassword = $this->secret('Confirm password?');
        }

        $password = bcrypt( $password );
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        $this->info('The user ' . $email . ' has been created');
    }
}
