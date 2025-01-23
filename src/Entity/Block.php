<?php

namespace App\Entity;

use App\Repository\BlockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlockRepository::class)]
class Block
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'headerBlocks')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Page $headerPage = null;

    #[ORM\ManyToOne(inversedBy: 'bodyBlocks')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Page $bodyPage = null;

    #[ORM\ManyToOne(inversedBy: 'footerBlocks')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Page $footerPage = null;

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

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getHeaderPage(): ?Page
    {
        return $this->headerPage;
    }

    public function setHeaderPage(?Page $page): static
    {
        $this->headerPage = $page;

        return $this;
    }

    public function getBodyPage(): ?Page
    {
        return $this->bodyPage;
    }

    public function setBodyPage(?Page $page): static
    {
        $this->bodyPage = $page;

        return $this;
    }

    public function getFooterPage(): ?Page
    {
        return $this->footerPage;
    }

    public function setFooterPage(?Page $page): static
    {
        $this->footerPage = $page;

        return $this;
    }
}
