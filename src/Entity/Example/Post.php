<?php

namespace App\Entity\Example;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @Groups({"readable", "editable"})
     * @Assert\NotBlank
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"readable", "editable"})
     */
    protected $description;

    /**
     * @var PostCategory
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Example\PostCategory", inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"readable", "editable"})
     * @Assert\NotBlank
     * @RestAssert\EntityExist
     */
    protected $category;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Example\PostCategory", inversedBy="oneToOne", cascade={"persist", "remove"})
     */
    private $oneToOne;

    /**
     * @Groups({"readable", "editable"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Example\PostCategory", inversedBy="manyToMany")
     */
    private $manyToMany;

    public function __construct()
    {
        $this->manyToMany = new ArrayCollection();
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

    public function getOneToOne(): ?PostCategory
    {
        return $this->oneToOne;
    }

    public function setOneToOne(?PostCategory $oneToOne): self
    {
        $this->oneToOne = $oneToOne;

        return $this;
    }

    /**
     * @return Collection|PostCategory[]
     */
    public function getManyToMany(): Collection
    {
        return $this->manyToMany;
    }

    public function addManyToMany(PostCategory $manyToMany): self
    {
        if (!$this->manyToMany->contains($manyToMany)) {
            $this->manyToMany[] = $manyToMany;
        }

        return $this;
    }

    public function removeManyToMany(PostCategory $manyToMany): self
    {
        if ($this->manyToMany->contains($manyToMany)) {
            $this->manyToMany->removeElement($manyToMany);
        }

        return $this;
    }
}
