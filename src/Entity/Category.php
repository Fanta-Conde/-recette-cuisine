<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $Ingredient = null;

    #[ORM\Column(length: 255)]
    private ?string $Recipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getIngredient(): ?string
    {
        return $this->Ingredient;
    }

    public function setIngredient(string $Ingredient): static
    {
        $this->Ingredient = $Ingredient;

        return $this;
    }

    public function getRecipe(): ?string
    {
        return $this->Recipe;
    }

    public function setRecipe(string $Recipe): static
    {
        $this->Recipe = $Recipe;

        return $this;
    }
}
