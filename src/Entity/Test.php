<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datess;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatess(): ?\DateTimeInterface
    {
        return $this->datess;
    }

    public function setDatess(\DateTimeInterface $datess): self
    {
        $this->datess = $datess;

        return $this;
    }
}
