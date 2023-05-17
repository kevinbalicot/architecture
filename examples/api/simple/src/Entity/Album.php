<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Constraints;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: false)]
    #[Constraints\NotBlank]
    private ?string $title;

    #[ORM\Column(length: 255, nullable: false)]
    #[Constraints\NotBlank]
    private ?string $author;

    #[ORM\Column(nullable: false)]
    private bool $listened = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function isListened(): bool
    {
        return $this->listened;
    }

    public function setListened(bool $listened): void
    {
        $this->listened = $listened;
    }
}
