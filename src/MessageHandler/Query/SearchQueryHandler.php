<?php


namespace App\MessageHandler\Query;


use App\Message\Query\SearchQuery;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SearchQueryHandler implements MessageHandlerInterface
{
    public function __invoke(SearchQuery $searchQuery)
    {
        sleep(1);

        return $searchQuery->getTerm();
    }
}