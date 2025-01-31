<?php

namespace App\Entity;

use App\Repository\HeaderBlockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeaderBlockRepository::class)]
class HeaderBlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column(length: 255, nullable: false)]
    // private ?string $type = 'default_type';

    // #[ORM\Column(length: 255)]
    // private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'headerBlock')]
    private ?Page $headerBlock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getType(): ?string
    // {
    //     return $this->type;
    // }

    // public function setType(string $type): static
    // {
    //     $this->type = $type;

    //     return $this;
    // }

    // public function getContent(): ?string
    // {
    //     return $this->content;
    // }

    // public function setContent(string $content): static
    // {
    //     $this->content = $content;

    //     return $this;
    // }

    public function getHeaderBlock(): ?Page
    {
        return $this->headerBlock;
    }

    public function setHeaderBlock(?Page $headerBlock): static
    {
        $this->headerBlock = $headerBlock;

        return $this;
    }
}
