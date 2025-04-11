<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeType;
use App\Repository\RecipeRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class RecipeController extends AbstractController
{
    #[Route('recipe', name: 'recipe_index')]
    public function index(RecipeRepository $recipeRepository): Response

    {
        $recipes=$recipeRepository->findAll();
        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }




    //     // TODO
    //     // creer une recette
    //     // creer le formulaire de recette


    #[Route('/recipe/addRecipe', name: 'recipe_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response

    {
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On rajoute les dernières infos qui manquent
            $recipe->setCreatedOn(new DateTime());
            $recipe->setModifiedOn(new DateTime());
            $recipe->setNumberOfLikes(0);

            // On sauvegarde quand tout est prêt
            $entityManager->persist($recipe);
            $entityManager->flush();

            return $this->redirectToRoute('recipe_index');
        }

        return $this->render('recipe/addRecipe.html.twig', [
            'form' => $form->createView(),
        ]);
    }



    //Route de detail
    #[Route('/recipe/{id}', name: 'recipe_show', methods: ['GET'])]
public function detail(int $id, RecipeRepository $recipeRepository): Response
{
    $recipe = $recipeRepository->find($id);

    if (!$recipe) {
        throw $this->createNotFoundException('Recette introuvable.');
    }

    return $this->render('recipe/show.html.twig', [
        'recipe' => $recipe,
    ]);
}










}
