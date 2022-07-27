<?php

namespace Tests\Unit;

use App\Services\Mailer;
use Illuminate\Support\Facades\Mail;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }
    
    public function testEmailSender()
    {
        Mail::fake();
    
        $mailer = new Mailer();
        $logger = new NullLogger();
        $mailer->sendEmail('qwerty', $logger);
        Mail::assertSent('templates.email');
    }
}
