<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Psr\Log\LoggerInterface;

class Mailer
{
    public function sendEmail(
        string $emailSubject,
        LoggerInterface $logger
    ) {
        Mail::send('templates.email', [], function ($message) use ($emailSubject) {
            $message->to('hello@example.com')->subject($emailSubject);
        });
        $logger->info('email was sent!');
    }
}
