<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create
                            {name : The email of the user}
                             {--email= : Name and surname of the user }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user with name and email';

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
        $userEmail= $this->option('email');
        $name = $this->argument('name');
        $user = User::create([
            'email' => $userEmail,
            'name' => $name
        ]);
        $this->info($user->name. ' user has been created');
    }
}
