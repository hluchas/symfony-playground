<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use App\Repository\UserRepository;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, UserService $userService): Response
    {
        $entity = new User();
        $form = $this->createForm(UserType::class, $entity);

        /** @var UserRepository $repository */
//        $repository = $this->getDoctrine()->getRepository(User::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $userService->save($form->getData());

            die('TY!');
        }

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'form' => $form->createView(),
        ]);
    }
}
