<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $for_expense = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Cashflow::class, orphanRemoval: true)]
    private Collection $cashflows;

    public function __construct()
    {
        $this->cashflows = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isForExpense(): ?bool
    {
        return $this->for_expense;
    }

    public function setForExpense(bool $for_expense): static
    {
        $this->for_expense = $for_expense;

        return $this;
    }

    /**
     * @return Collection<int, Cashflow>
     */
    public function getCashflows(): Collection
    {
        return $this->cashflows;
    }

    public function addCashflow(Cashflow $cashflow): static
    {
        if (!$this->cashflows->contains($cashflow)) {
            $this->cashflows->add($cashflow);
            $cashflow->setCategory($this);
        }

        return $this;
    }

    public function removeCashflow(Cashflow $cashflow): static
    {
        if ($this->cashflows->removeElement($cashflow)) {
            // set the owning side to null (unless already changed)
            if ($cashflow->getCategory() === $this) {
                $cashflow->setCategory(null);
            }
        }

        return $this;
    }
}
