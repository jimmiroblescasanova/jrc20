<?php

namespace App\Console\Commands;

use App\Mail\DailySuscribersEmail;
use App\Models\Registration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailySuscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'suscribers:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily suscribers list to email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dailySuscribers = Registration::query()
            ->where('created_at', '>=', now()->subDay())
            ->get();

        if ($dailySuscribers->count() >= 1) {
            Mail::to(env('ADMIN_EMAIL'))->send(new DailySuscribersEmail($dailySuscribers));
        }

        return Command::SUCCESS;
    }
}
