<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendHeartBeat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'heartbeat:send {heartBeat}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para enviar Ritmo Cardiaco';

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
//        $user = \App\User::first();
//        $message = \App\ChatMessage::create([
//            'user_id' => $user->id,
//            'message' => $this->argument('message')
//        ]);
        $heartbeat =  [0, 0, 3, -4, 10, -7, 3, 0, 0];

        event(new \App\Events\UpdateHeartBeat($heartbeat));
    }
}
