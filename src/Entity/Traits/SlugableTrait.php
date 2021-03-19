<?php


namespace App\Entity\Traits;


trait SlugableTrait
{
    /**
     * @var string
     * @ORM\Column(length=255, nullable=true)
     */
    private string $slug;

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
        return $this;
    }
}
