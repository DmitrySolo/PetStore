<?php

namespace AppBundle\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Vendor
 * @package AppBundle\Entity\Domain
 * @ORM\Entity()
 * @ORM\Table(name="public.publisher")
 * @UniqueEntity("name")
 */
class Publisher
{
    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     * @ORM\Column(type="uuid", unique=true, name="id")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * Vendor constructor.
     * @param string      $name
     * @param string|null $description
     */
    public function __construct(string $name, string $description = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->makeSlug($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $name
     */
    private function makeSlug(string $name): void
    {
        $this->slug = mb_strtolower(
            preg_replace('/\s/', '_', $name)
        );
    }
}
