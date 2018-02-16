<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecordRepository")
 */
class Record
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $caloriesPerHundredGram;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $day;

    /**
     * Record constructor.
     */
    public function __construct()
    {
        $this->day = new \DateTime();
    }

    /**
     * @return float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getCaloriesPerHundredGram(): ?int
    {
        return $this->caloriesPerHundredGram;
    }

    /**
     * @param int $caloriesPerHundredGram
     */
    public function setCaloriesPerHundredGram(int $caloriesPerHundredGram): void
    {
        $this->caloriesPerHundredGram = $caloriesPerHundredGram;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDay(): \DateTime
    {
        return $this->day;
    }

    /**
     * @param \DateTime $day
     */
    public function setDay(\DateTime $day): void
    {
        $this->day = $day;
    }

    public function getCalories(): int {
        return (int) $this->caloriesPerHundredGram * $this->amount;
    }
}
