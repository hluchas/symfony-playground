<?php

namespace App\Controller;

use App\Entity\Entity;
use App\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request): Response
    {
        $entity = new Entity();
        $form = $this->createForm(EntityType::class, $entity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Entity $data */
            $data = $form->getData();

            throw new \RuntimeException('POST not implemented');
        }

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'form' => $form->createView(),
        ]);
    }
}
