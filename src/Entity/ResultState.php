<?php

namespace App\Entity;

use App\Repository\ResultStateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultStateRepository::class)
 */
class ResultState
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $matrix = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatrix(): ?array
    {
        return $this->matrix;
    }

    public function setMatrix(?array $matrix): self
    {
        $this->matrix = $matrix;

        return $this;
    }
}
