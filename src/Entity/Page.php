<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    // #[ORM\Column(nullable: true)]
    // private ?array $meta = null;

    #[ORM\Column]
    private ?bool $is_published = null;

    // #[ORM\Column(length: 255, nullable: true)]
    // private ?string $image = null;

    // #[ORM\Column(nullable: true)]
    // private ?\DateTimeImmutable $createdAt = null;

    // #[ORM\Column(nullable: true)]
    // private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, HeaderBlock>
     */
    #[ORM\OneToMany(targetEntity: HeaderBlock::class, mappedBy: 'headerBlock', cascade: ['persist', 'remove'])]
    private Collection $headerBlock;

    /**
     * @var Collection<int, BodyBlock>
     */
    #[ORM\OneToMany(targetEntity: BodyBlock::class, mappedBy: 'bodyBlock', cascade: ['persist', 'remove'])]
    private Collection $bodyBlock;

    /**
     * @var Collection<int, FooterBlock>
     */
    #[ORM\OneToMany(targetEntity: FooterBlock::class, mappedBy: 'footerBlock', cascade: ['persist', 'remove'])]
    private Collection $footerBlock;

    public function __construct()
    {
        $this->headerBlock = new ArrayCollection();
        $this->bodyBlock = new ArrayCollection();
        $this->footerBlock = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    // public function getImage(): ?string
    // {
    //     return $this->image;
    // }

    // public function setImage(?string $image): self
    // {
    //     $this->image = $image;

    //     return $this;
    // }

    // public function getMeta(): ?array
    // {
    //     return $this->meta;
    // }

    // public function setMeta(?array $meta): static
    // {
    //     $this->meta = $meta;

    //     return $this;
    // }

    public function isPublished(): ?bool
    {
        return $this->is_published;
    }

    public function setIsPublished(bool $is_published): static
    {
        $this->is_published = $is_published;

        return $this;
    }

    // public function getCreatedAt(): ?\DateTimeImmutable
    // {
    //     return $this->createdAt;
    // }

    // public function setCreatedAt(\DateTimeImmutable $createdAt): static
    // {
    //     $this->createdAt = $createdAt;

    //     return $this;
    // }

    // public function getUpdatedAt(): ?\DateTimeImmutable
    // {
    //     return $this->updatedAt;
    // }

    // public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    // {
    //     $this->updatedAt = $updatedAt;

    //     return $this;
    // }


    /**
     * @return Collection<int, HeaderBlock>
     */
    public function getHeaderBlock(): Collection
    {
        return $this->headerBlock;
    }

    public function addHeaderBlock(HeaderBlock $headerBlock): self
    {
        if (!$this->headerBlock->contains($headerBlock)) {
            $this->headerBlock[] = $headerBlock;
            $headerBlock->setHeaderBlock($this); // Связываем блок с текущей страницей
        }
    
        return $this;
    }
    
    public function removeHeaderBlock(HeaderBlock $headerBlock): self
    {
        if ($this->headerBlock->removeElement($headerBlock)) {
            // Разрываем связь, если блок принадлежит текущей странице
            if ($headerBlock->getHeaderBlock() === $this) {
                $headerBlock->setHeaderBlock(null);
            }
        }
    
        return $this;
    }

    /**
     * @return Collection<int, BodyBlock>
     */
    public function getBodyBlock(): Collection
    {
        return $this->bodyBlock;
    }

    public function addBodyBlock(BodyBlock $bodyBlock): self
    {
        if (!$this->bodyBlock->contains($bodyBlock)) {
            $this->bodyBlock[] = $bodyBlock;
            $bodyBlock->setBodyBlock($this); // Связываем блок с текущей страницей
        }
    
        return $this;
    }
    
    public function removeBodyBlock(BodyBlock $bodyBlock): self
    {
        if ($this->bodyBlock->removeElement($bodyBlock)) {
            // Разрываем связь, если блок принадлежит текущей странице
            if ($bodyBlock->getBodyBlock() === $this) {
                $bodyBlock->setBodyBlock(null);
            }
        }
    
        return $this;
    }

    /**
     * @return Collection<int, FooterBlock>
     */
    public function getFooterBlock(): Collection
    {
        return $this->footerBlock;
    }

    public function addFooterBlock(FooterBlock $footerBlock): self
    {
        if (!$this->footerBlock->contains($footerBlock)) {
            $this->footerBlock[] = $footerBlock;
            $footerBlock->setFooterBlock($this); // Связываем блок с текущей страницей
        }
    
        return $this;
    }
    
    public function removeFooterBlock(FooterBlock $footerBlock): self
    {
        if ($this->footerBlock->removeElement($footerBlock)) {
            // Разрываем связь, если блок принадлежит текущей странице
            if ($footerBlock->getFooterBlock() === $this) {
                $footerBlock->setFooterBlock(null);
            }
        }
    
        return $this;
    }
}
