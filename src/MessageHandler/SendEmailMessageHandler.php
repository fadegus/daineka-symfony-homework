<?php

namespace App\MessageHandler;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use App\Message\SendEmailMessage;
use Doctrine\ORM\EntityManagerInterface;

#[AsMessageHandler]
class SendEmailMessageHandler
{
    public function __invoke(SendEmailMessage $message): void
    {
        // Имитация отправки
        sleep(5);
        echo "Message was send: {$message->email}\n";
    }
}
