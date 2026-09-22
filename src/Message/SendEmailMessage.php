<?php 

namespace App\Message;

class SendEmailMessage
{
    public function __construct(
        public readonly string $email,
        public readonly string $subject
    ) {}
}
