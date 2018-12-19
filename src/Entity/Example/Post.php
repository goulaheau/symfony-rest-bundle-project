<?php

namespace App\Entity\Example;

use Doctrine\ORM\Mapping as ORM;
use Goulaheau\RestBundle\Entity\RestEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Goulaheau\RestBundle\Validator\Constraints as RestAssert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Example\PostRepository")
 * @ORM\Table(name="example_post")
 */
class Post extends RestEntity
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "update"})
     * @Assert\NotBlank
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read", "update"})
     */
    protected $description;

    /**
     * @var PostCategory
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Example\PostCategory", inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read", "update"})
     * @Assert\NotBlank
     * @RestAssert\EntityExist
     */
    protected $category;

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

    public function getCategory(): ?PostCategory
    {
        return $this->category;
    }

    public function setCategory(?PostCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function special(string $string)
    {
        return $string . '!';
    }

    public function special2(string $string)
    {
        return $string . '?';
    }
}
