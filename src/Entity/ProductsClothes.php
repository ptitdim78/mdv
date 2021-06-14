<?php

namespace App\Entity;

use App\Repository\ProductsClothesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductsClothesRepository::class)
 * @Vich\Uploadable
 */
class ProductsClothes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="40", maxMessage="Ce champs ne peut depasser 40 caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(max="300", maxMessage="Ce champs ne peut depasser 300 caractères")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $online;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="25", maxMessage="Ce champs ne peut depasser 25 caractères")
     */
    private $poidsCarton;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="15", maxMessage="Ce champs ne peut depasser 15 caractères")
     */
    private $dimensionColis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="150", maxMessage="Ce champs ne peut depasser 150 caractères")
     */
    private $infos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="15", maxMessage="Ce champs ne peut depasser 15 caractères")
     */
    private $poids;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="80", maxMessage="Ce champs ne peut depasser 80 caractères")
     */
    private $composition;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    public function getPoidsCarton(): ?string
    {
        return $this->poidsCarton;
    }

    public function setPoidsCarton(string $poidsCarton): self
    {
        $this->poidsCarton = $poidsCarton;

        return $this;
    }

    public function getDimensionColis(): ?string
    {
        return $this->dimensionColis;
    }

    public function setDimensionColis(?string $dimensionColis): self
    {
        $this->dimensionColis = $dimensionColis;

        return $this;
    }

    public function getInfos(): ?string
    {
        return $this->infos;
    }

    public function setInfos(?string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(?string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(?string $composition): self
    {
        $this->composition = $composition;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }
}
