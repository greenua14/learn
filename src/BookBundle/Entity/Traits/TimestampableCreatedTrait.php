<?php

namespace BookBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait TimestampableCreatedTrait
{
    /**
     * @Gedmo\Timestampable(on="created")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    public function getCreated()
    {
        return $this->created;
    }

}
