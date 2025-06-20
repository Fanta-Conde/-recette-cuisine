<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(RecipeRepository $repo): Response
    {
        $recipes = $repo->findBy(['isPublished' => true]);

        return $this->render('home/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }
}
