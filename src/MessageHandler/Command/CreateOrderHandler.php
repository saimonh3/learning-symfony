<?php


namespace App\MessageHandler\Command;


use App\Message\Command\CreateOrder;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateOrderHandler implements MessageHandlerInterface
{
    public function __invoke(CreateOrder $createOrder)
    {
        sleep(4);
        return $createOrder->getProductName();
    }
}