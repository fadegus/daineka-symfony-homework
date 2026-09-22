<?php

namespace App\Controller;

use App\Message\SendEmailMessage; // DTO

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Messenger\MessageBusInterface;

class WorkerController extends AbstractController
{
    #[Route('/note_send', name: 'note_send')]
    public function index(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new SendEmailMessage('daineka@local.local', 'Hello!'));

        return new Response('Запрос принят! Письмо отправляется в фоне');
    }
}
