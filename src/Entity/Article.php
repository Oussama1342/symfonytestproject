<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $libele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixunitaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $TVA;

    /**
     * @ORM\Column(type="integer")
     */
    private $marge;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixTTC;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantitedisponibl;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datevalidite;

    /**
     * @ORM\Column(type="integer")
     */
    private $codbar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibele(): ?string
    {
        return $this->libele;
    }

    public function setLibele(string $libele): self
    {
        $this->libele = $libele;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getCodeVar(): ?string
    {
        return $this->code_var;
    }

    public function setCodeVar(string $code_var): self
    {
        $this->code_var = $code_var;

        return $this;
    }

   

    public function getPrixUnitaire(): ?int
    {
        return $this->prixunitaire;
    }

    public function setPrixUnitaire(int $prixunitaire): self
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    public function getTVA(): ?int
    {
        return $this->TVA;
    }

    public function setTVA(int $TVA): self
    {
        $this->TVA = $TVA;

        return $this;
    }

    public function getMarge(): ?int
    {
        return $this->marge;
    }

    public function setMarge(int $marge): self
    {
        $this->marge = $marge;

        return $this;
    }

    public function getPrixTTC(): ?int
    {
        return $this->prixTTC;
    }

    public function setPrixTTC(int $prixTTC): self
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    public function getQuantiteDisponibl(): ?int
    {
        return $this->quantitedisponibl;
    }

    public function setQuantiteDisponibl(int $quantitedisponibl): self
    {
        $this->quantitedisponibl = $quantitedisponibl;

        return $this;
    }

    public function getDateValidite(): ?\DateTimeInterface
    {
        return $this->datevalidite;
    }

    public function setDateValidite(?\DateTimeInterface $datevalidite): self
    {
        $this->datevalidite = $datevalidite;

        return $this;
    }

    public function getCodBar(): ?int
    {
        return $this->codbar;
    }

    public function setCodBar(int $codbar): self
    {
        $this->codbar = $codbar;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

 

  
}
