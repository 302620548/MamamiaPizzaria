<?php
namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    /**
     * @Route("/home")
     */

    public function home(CategoryRepository $repository): Response
    {
        $categories = $repository->findAll();

        return $this->render('pizza/home.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/products/{id}")
     */
    public function products(Category $category, PizzaRepository $repository): Response
    {
        $pizzas = $repository->findBy(["cat" => $category]);

        return $this->render('pizza/products.html.twig', [
            "category" => $category,
            'pizzas' => $pizzas
        ]);
    }

    /**
     * @Route("/products/{id}")
     */
    public function order(): Response
    {

        return $this->render('pizza/order.html.twig', [
        ]);
    }

    /**
     * @Route("/contact")
     */
    public function contact(): Response
    {

        return $this->render('pizza/contact.html.twig', [
        ]);
    }

    /**
     * @Route("/about")
     */
    public function about(): Response
    {

        return $this->render('pizza/contact.html.twig', [
        ]);
    }
}