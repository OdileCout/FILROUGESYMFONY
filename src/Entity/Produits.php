<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 */
class Produits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomProduit;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prixUnitaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantiteDisponibles;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroImage;

    /**
     * @ORM\OneToMany(targetEntity=ProduitCommande::class, mappedBy="produits")
     */
    private $produitcommande;

    public function __construct()
    {
        $this->produitcommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(float $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getQuantiteDisponibles(): ?int
    {
        return $this->quantiteDisponibles;
    }

    public function setQuantiteDisponibles(int $quantiteDisponibles): self
    {
        $this->quantiteDisponibles = $quantiteDisponibles;

        return $this;
    }

    public function getNumeroImage(): ?int
    {
        return $this->numeroImage;
    }

    public function setNumeroImage(int $numeroImage): self
    {
        $this->numeroImage = $numeroImage;

        return $this;
    }

    /**
     * @return Collection|ProduitCommande[]
     */
    public function getProduitcommande(): Collection
    {
        return $this->produitcommande;
    }

    public function addProduitcommande(ProduitCommande $produitcommande): self
    {
        if (!$this->produitcommande->contains($produitcommande)) {
            $this->produitcommande[] = $produitcommande;
            $produitcommande->setProduits($this);
        }

        return $this;
    }

    public function removeProduitcommande(ProduitCommande $produitcommande): self
    {
        if ($this->produitcommande->removeElement($produitcommande)) {
            // set the owning side to null (unless already changed)
            if ($produitcommande->getProduits() === $this) {
                $produitcommande->setProduits(null);
            }
        }

        return $this;
    }
}
