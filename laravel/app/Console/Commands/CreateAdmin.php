<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Admin;
use Symfony\Component\Console\Input\InputOption;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:create-admin
                               {--name= : the name of the admin}
                               {--email= : the email of the admin}
                               {--password= : the password of the admin}
                               {--job_title= : the job title for the admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the admins in the system';

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
        $admin = new Admin();
        $admin->name = $this->option('name');
        $admin->email = $this->option('email');
        $admin->password = $this->option('password');
        $admin->job_title = $this->option('job_title');
        $admin->pic = 'default.png';
        $admin->save();
        $this->info('Admin created successfully');
    }
}
