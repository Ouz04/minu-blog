<?php

declare (strict_types=1);
namespace App\Entity;

use DateTime;

trait Timestapable
{
    /***
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;
    /***
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $updatedAt;

    

    /**
     * Get the value of createdAt
     *
     * @return  DateTime
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    
    public function setUpdatedAt(?DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}