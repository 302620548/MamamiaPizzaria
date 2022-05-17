<?php
namespace App\Controller;

use App\Entity\Bestellen;
use App\Entity\Category;
use App\Entity\Order;
use App\Entity\Pizza;
use App\Entity\Pizzas;
use App\Repository\BestellenRepository;
use App\Repository\CategoryRepository;
use App\Repository\OrderRepository;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/orderpizza/{id}",name="app_order")
     */
    public function new(Pizza $pizza, Request $request, OrderRepository $orderRepository): Response
    {
        $order = new Order();
        $order->setPizza($pizza);
        $order->setStatus("ordered");

        $form = $this->createFormBuilder($order)
            ->add('fname')
            ->add('lname')
            ->add('address')
            ->add('city')
            ->add('zipcode')
            ->add('size')
            ->add('submit', SubmitType::class, ['label' => 'OrderPizza Pizza'])
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();

            $orderRepository->add($order);
            return $this->redirectToRoute("task_succes");
        }


        return $this->renderForm('pizza/order.html.twig', ['form' => $form]);
    }


    /**
     * @Route("/order/succes/",name="task_succes")
     */
    public function succes(): Response
    {
        return $this->render('pizza/task_succes.html.twig');

    }
}