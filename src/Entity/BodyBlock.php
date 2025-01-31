<?php

namespace App\Entity;

use App\Repository\BodyBlockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BodyBlockRepository::class)]
class BodyBlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $type = 'default_type';

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'bodyBlock')]
    private ?Page $bodyBlock = null;

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

    public function getBodyBlock(): ?Page
    {
        return $this->bodyBlock;
    }

    public function setBodyBlock(?Page $bodyBlock): static
    {
        $this->bodyBlock = $bodyBlock;

        return $this;
    }
}
