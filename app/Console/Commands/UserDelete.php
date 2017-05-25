<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class UserDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a user';

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
        $email = $this->ask('What is the user email?');
        $user = User::where('email', $email)->get()->first();
        while ( $user === null ) {
            $this->error('No user found with '. $email. ' please try again' );
            $email = $this->ask('What is the user email?');
            $user = User::where('email', $email)->get()->first();
        }
        $user->delete();
        $this->info('the user '. $email . ' has been deleted');
    }
}
