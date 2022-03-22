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

        return $this->render('pizza/home.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/products/{category}")
     */
    public function products($category): Response
    {

        $pizzas = [
            "vlees" => ['Salame', 'Hawaii', 'Italia'],
            "vegetarisch" => ['Margherita', 'Funghi', 'Vegetaria'],
            "vis" => ['Salmone']
        ];

        return $this->render('pizza/products.html.twig', [
            'pizzas' => $pizzas[$category]
        ]);
    }

    /**
     * @Route("/contact}")
     */
    public function contact(): Response
    {
        return $this->render('pizza/conact.html.twig');
    }
}