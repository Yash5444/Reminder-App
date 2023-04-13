<?php

namespace App\Console\Commands;

use App\Models\Reminder;
use App\Models\User;
use App\Notifications\SendReminderMail as NotificationsSendReminderMail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends reminder mail to users when the time comes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminders = Reminder::all();
        foreach ($reminders as $key => $reminder) {
            if(Carbon::now()->format('d-m-Y H:i a') == Carbon::parse($reminder->date_time)->format('d-m-Y H:i a')){
                $user = User::first();
                $user->notify(new NotificationsSendReminderMail());
            }
            Log::info("Cron Run");
        }
        return true;
    }
}
