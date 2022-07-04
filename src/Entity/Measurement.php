<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $value;

    #[ORM\Column(type: 'datetime')]
    private $datetime;

    #[ORM\ManyToOne(targetEntity: MeasurementType::class, inversedBy: 'measurements')]
    #[ORM\JoinColumn(nullable: false)]
    private $measurementType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getMeasurementType(): ?MeasurementType
    {
        return $this->measurementType;
    }

    public function setMeasurementType(?MeasurementType $measurementType): self
    {
        $this->measurementType = $measurementType;

        return $this;
    }
}
