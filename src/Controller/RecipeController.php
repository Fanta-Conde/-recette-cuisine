<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/mes-recettes', name: 'my_recipes')]
    public function myRecipes(RecipeRepository $repo): Response
    {
        $user = $this->getUser();
        $recipes = $repo->findBy(['author' => $user]);

        return $this->render('recipe/my_recipes.html.twig', [
            'recipes' => $recipes,
        ]);
    }

    #[Route('/recipe/{id}/toggle', name: 'recipe_toggle')]
    public function togglePublish(Recipe $recipe, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $recipe->setIsPublished(!$recipe->isPublished());
        $em->flush();

        return $this->redirectToRoute('my_recipes');
    }
}
