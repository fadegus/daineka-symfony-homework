<?php

namespace App\Entity;

use App\Repository\NotesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: NotesRepository::class)]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $Name = null;

    #[ORM\Column(length: 100)]
    private ?string $Category = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Assert\Positive]
    private ?int $Priority = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank]
    private ?\DateTime $Deadline = null;

    #[ORM\Column]
    private ?bool $Statusdone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->Category;
    }

    public function setCategory(string $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->Priority;
    }

    public function setPriority(?int $Priority): static
    {
        $this->Priority = $Priority;

        return $this;
    }

    public function getDeadline(): ?\DateTime
    {
        return $this->Deadline;
    }

    public function setDeadline(?\DateTime $Deadline): static
    {
        $this->Deadline = $Deadline;

        return $this;
    }

    public function isStatusdone(): ?bool
    {
        return $this->Statusdone;
    }

    public function setStatusdone(bool $Statusdone): static
    {
        $this->Statusdone = $Statusdone;

        return $this;
    }
}
