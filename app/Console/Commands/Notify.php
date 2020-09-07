<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\NotifyEmail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notify for users every day';

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
        $emails = \App\User::select("email")->get();
        $data   = ["title" => "This is the email title", "body" => "php"];
        foreach($emails as $email) {
          Mail::to($email)->send(new NotifyEmail(data));
        }
    }
}
