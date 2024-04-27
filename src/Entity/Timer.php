<?php

namespace App\Entity;

use App\Repository\TimerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimerRepository::class)]
class Timer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endTime = null;

    #[ORM\OneToMany(targetEntity: ConnectedDevice::class, mappedBy: 'timer')]
    private Collection $connectedDevices;

    public function __construct()
    {
        $this->connectedDevices = new ArrayCollection();
    }

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * @return Collection<int, ConnectedDevice>
     */
    public function getConnectedDevices(): Collection
    {
        return $this->connectedDevices;
    }

    public function addConnectedDevice(ConnectedDevice $connectedDevice): static
    {
        if (!$this->connectedDevices->contains($connectedDevice)) {
            $this->connectedDevices->add($connectedDevice);
            $connectedDevice->setTimer($this);
        }

        return $this;
    }

    public function removeConnectedDevice(ConnectedDevice $connectedDevice): static
    {
        if ($this->connectedDevices->removeElement($connectedDevice)) {
            // set the owning side to null (unless already changed)
            if ($connectedDevice->getTimer() === $this) {
                $connectedDevice->setTimer(null);
            }
        }

        return $this;
    }

  
}
