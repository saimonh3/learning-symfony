<?php


namespace App\Controller;

use App\Message\Command\CreateOrder;
use App\Message\Command\SendSms;
use App\Message\Query\SearchQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    use HandleTrait;

    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/", name="shop")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/search", name="search")
     */
    public function search()
    {
        $search = 'a phone';

        $result = $this->handle(new SearchQuery($search));

        return $this->render('search.html.twig', [
            'search' => $result
        ]);
    }

    /**
     * @Route("/sms", name="sms")
     */
    public function sendSms()
    {
        $number = 323232323;
        $this->messageBus->dispatch(new SendSms( $number ));

        return $this->render('sms.html.twig', [
            'number' => $number
        ]);
    }

    /**
     * @Route("/order", name="order")
     */
    public function order()
    {
        $productId = 1;
        $productPrice = '100.00';
        $productName = 'iPhone';

        $this->dispatchMessage(new CreateOrder($productId, $productPrice));

        return $this->render('order.html.twig', [
            'order' => $productName
        ]);
    }
}