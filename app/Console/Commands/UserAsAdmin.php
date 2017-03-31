<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class UserAsAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'user:admin {userEmail} ';

    protected $signature = 'user:admin
                            {email : The email of the user}
                             {--admin= : true or false }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set a user as admin using their email';

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
        $userEmail= $this->argument('email');
        $isAdmin = $this->option('admin');
        $user = User::where('email', $userEmail)->get()->first();
        if ( isset( $user ) ) {
            if ( $isAdmin === 'true' ) {
                $user->is_admin = 1;
                $this->info($user->name. ' is now an admin');
            } elseif ( $isAdmin === 'false' ) {
                $user->is_admin = 0;
                $this->info($user->name. ' is now not an admin');
            } else {
                $this->error('admin option needs to be true or false');
            }
            $user->save();
        } else {
            $this->error('We could not find anyone with email '.$userEmail);
        }
    }
}
