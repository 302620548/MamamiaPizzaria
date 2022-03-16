<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/home")
     */

    public function home(): Response
    {
        $categories = ["vlees", "vegetarisch", "vis"];
        $pizzas = [
            "vlees" => ['Salame', 'Hawaii'],
            "vegetarisch" => ['margarita', 'Groente'],
            "vis" => ['vis1', 'vis2']
        ];

        return $this->render('pizza/home.html.twig', [
            'pizzas' => $pizzas
        ]);
    }
}