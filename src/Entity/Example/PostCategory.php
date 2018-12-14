<?php

namespace App\Entity\Example;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Goulaheau\RestBundle\Entity\RestEntity;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"read", "update"})
     */
    protected $name;

    /**
     * @var Post[] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Example\Post", mappedBy="category")
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
}