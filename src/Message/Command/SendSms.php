<?php


namespace App\Message\Command;


class SendSms
{

    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
