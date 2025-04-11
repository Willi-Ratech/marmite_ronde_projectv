<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NewRecipeController extends AbstractController{
    #[Route('/new/recipe', name: 'app_new_recipe')]
    public function index(): Response
    {
        return $this->render('new_recipe/index.html.twig', [
            'controller_name' => 'NewRecipeController',
        ]);
    }
}
