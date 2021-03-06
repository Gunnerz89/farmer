<?php

namespace App\Entity;

use App\Repository\DeviceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeviceRepository::class)]
class Device
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $producer;

    #[ORM\ManyToOne(targetEntity: DeviceType::class, inversedBy: 'devices')]
    #[ORM\JoinColumn(nullable: false)]
    private $deviceType;

    #[ORM\ManyToMany(targetEntity: MeasurementType::class, inversedBy: 'devices')]
    private $measurementTypes;

    public function __construct()
    {
        $this->measurementTypes = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(?string $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    public function getDeviceType(): ?DeviceType
    {
        return $this->deviceType;
    }

    public function setDeviceType(?DeviceType $deviceType): self
    {
        $this->deviceType = $deviceType;

        return $this;
    }

    /**
     * @return Collection<int, MeasurementType>
     */
    public function getMeasurementTypes(): Collection
    {
        return $this->measurementTypes;
    }

    public function addMeasurementType(MeasurementType $measurementType): self
    {
        if (!$this->measurementTypes->contains($measurementType)) {
            $this->measurementTypes[] = $measurementType;
        }

        return $this;
    }

    public function removeMeasurementType(MeasurementType $measurementType): self
    {
        $this->measurementTypes->removeElement($measurementType);

        return $this;
    }
}
