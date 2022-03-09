<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
    * @Route("/home")
    */

    public function homepage(): Response
    {
        $pizzas = ['salame', 'margarita'];
        return $this->render('pizza/home.html.twig', [
            'pizzas' => $pizzas
    ]);
    }
}