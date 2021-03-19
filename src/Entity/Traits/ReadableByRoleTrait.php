<?php


namespace App\Entity\Traits;


use Doctrine\ORM\Mapping as ORM;


trait ReadableByRoleTrait
{
    /**
     * @var bool
     *
     * @ORM\Column(name="readable_by_user", type="boolean")
     */
    private $readableByUser;

    /**
     * @var bool
     *
     * @ORM\Column(name="readable_by_admin", type="boolean")
     */
    private $readableByAdmin;

    /**
     * @return bool
     */
    public function isReadableByUser(): bool
    {
        return $this->readableByUser;
    }

    /**
     * @param bool $readableByUser
     * @return ReadableByRole
     */
    public function setReadableByUser(bool $readableByUser): ReadableByRole
    {
        $this->readableByUser = $readableByUser;

        return $this;
    }

    /**
     * @return bool
     */
    public function isReadableByAdmin(): bool
    {
        return $this->readableByAdmin;
    }

    /**
     * @param bool $readableByAdmin
     * @return ReadableByRole
     */
    public function setReadableByAdmin(bool $readableByAdmin): ReadableByRole
    {
        $this->readableByAdmin = $readableByAdmin;

        return $this;
    }
}
