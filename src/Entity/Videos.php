<?php

namespace App\Entity;

use App\Repository\VideosRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
//use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=VideosRepository::class)
 * @Vich\Uploadable
 */
class Videos
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $video;

    /**
     * @Vich\UploadableField(mapping="product_videos", fileNameProperty="video")
     * @var File
     */
    private $videoFile;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $updateAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $online;

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

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getVideoFile()
    {
        return $this->videoFile;
    }

    public function setVideoFile(File $video = null)
    {
        $this->videoFile = $video;

        if ($video) {
            $this->updateAt = new DateTime('now');
        }
    }

    public function getUpdateAt(): ?DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

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
}
