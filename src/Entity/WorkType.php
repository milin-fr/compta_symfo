<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkTypeRepository")
 */
class WorkType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $budgetEuro;

    /**
     * @ORM\Column(type="integer")
     */
    private $budgetCent;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Company", inversedBy="workTypes")
     */
    private $companies;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bill", mappedBy="workType")
     */
    private $bills;

    public function __construct()
    {
        $this->companies = new ArrayCollection();
        $this->bills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBudgetEuro(): ?int
    {
        return $this->budgetEuro;
    }

    public function setBudgetEuro(int $budgetEuro): self
    {
        $this->budgetEuro = $budgetEuro;

        return $this;
    }

    public function getBudgetCent(): ?int
    {
        return $this->budgetCent;
    }

    public function setBudgetCent(int $budgetCent): self
    {
        $this->budgetCent = $budgetCent;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return Collection|Company[]
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->contains($company)) {
            $this->companies->removeElement($company);
        }

        return $this;
    }

    /**
     * @return Collection|Bill[]
     */
    public function getBills(): Collection
    {
        return $this->bills;
    }

    public function addBill(Bill $bill): self
    {
        if (!$this->bills->contains($bill)) {
            $this->bills[] = $bill;
            $bill->setWorkType($this);
        }

        return $this;
    }

    public function removeBill(Bill $bill): self
    {
        if ($this->bills->contains($bill)) {
            $this->bills->removeElement($bill);
            // set the owning side to null (unless already changed)
            if ($bill->getWorkType() === $this) {
                $bill->setWorkType(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    /** 
     * @ORM\PrePersist
     */
    public function generateCreatedAt()
    {
        $this->created_at = new \DateTime();
    }

    /** 
     * @ORM\PreUpdate
     */
    public function generateUpdatedAt()
    {
        $this->updated_at = new \DateTime();
    }
}
