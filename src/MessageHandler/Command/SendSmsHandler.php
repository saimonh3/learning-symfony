<?php


namespace App\MessageHandler\Command;


use App\Message\Command\SendSms;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SendSmsHandler implements MessageHandlerInterface
{
    public function __invoke(SendSms $sendSms)
    {
        sleep(2);

        return $sendSms->getNumber();
    }
}