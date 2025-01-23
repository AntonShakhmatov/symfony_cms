<?php

namespace App\Entity;

use App\Repository\FooterBlockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FooterBlockRepository::class)]
class FooterBlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'footerBlock')]
    private ?Page $footerBlock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getFooterBlock(): ?Page
    {
        return $this->footerBlock;
    }

    public function setFooterBlock(?Page $footerBlock): static
    {
        $this->footerBlock = $footerBlock;

        return $this;
    }
}
