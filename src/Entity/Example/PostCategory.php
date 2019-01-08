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
 * @ORM\Entity(repositoryClass="App\Repository\Example\PostCategoryRepository")
 * @ORM\Table(name="example_post_category")
 */
class PostCategory extends RestEntity
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"readable", "editable"})
     * @Assert\NotBlank
     * @Assert\Length(min="2", max="255")
     */
    protected $name;

    /**
     * @var Post[] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Example\Post", mappedBy="category")
     * @Groups({"readable"})
     */
    protected $posts;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Example\Post", mappedBy="oneToOne", cascade={"persist", "remove"})
     * @Groups({"readable", "editable"})
     * @RestAssert\EntityExist
     */
    private $oneToOne;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Example\Post", mappedBy="manyToMany")
     */
    private $manyToMany;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
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

    /**
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setCategory($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getCategory() === $this) {
                $post->setCategory(null);
            }
        }

        return $this;
    }

    public function getOneToOne(): ?Post
    {
        return $this->oneToOne;
    }

    public function setOneToOne(?Post $oneToOne): self
    {
        $this->oneToOne = $oneToOne;

        // set (or unset) the owning side of the relation if necessary
        $newOneToOne = $oneToOne === null ? null : $this;
        if ($newOneToOne !== $oneToOne->getOneToOne()) {
            $oneToOne->setOneToOne($newOneToOne);
        }

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getManyToMany(): Collection
    {
        return $this->manyToMany;
    }

    public function addManyToMany(Post $manyToMany): self
    {
        if (!$this->manyToMany->contains($manyToMany)) {
            $this->manyToMany[] = $manyToMany;
            $manyToMany->addManyToMany($this);
        }

        return $this;
    }

    public function removeManyToMany(Post $manyToMany): self
    {
        if ($this->manyToMany->contains($manyToMany)) {
            $this->manyToMany->removeElement($manyToMany);
            $manyToMany->removeManyToMany($this);
        }

        return $this;
    }
}
