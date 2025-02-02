<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column(length: 255)]
    // private ?string $url = null;

    #[ORM\Column]
    private ?int $position = null;

    // #[ORM\Column(type: "json")]
    // private ?array $pages = [];

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $page = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getUrl(): ?string
    // {
    //     return $this->url;
    // }

    // public function setUrl(string $url): static
    // {
    //     $this->url = $url;

    //     return $this;
    // }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getPages(): ?string
    {
        return $this->page;
    }

    public function setPages(?string $page): self
    {
        $this->page = $page;

        return $this;
    }
}
