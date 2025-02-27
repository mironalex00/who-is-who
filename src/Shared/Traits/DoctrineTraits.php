<?php declare(strict_types=1);

#region Namespace
namespace Arm\Shared\Traits;
#endregion

#region Doctrine Class Annotations
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Table;
#endregion
#region Collections
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
#endregion
#region Mapping Joins
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinColumns;
use Doctrine\ORM\Mapping\JoinTable;
#endregion
#region Mapping Relations
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
#endregion
#region PHP Classes
use DateTime;
#endregion

trait DoctrineTraits {
    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    protected DateTime $createdAt;
    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    protected DateTime $updatedAt;
    #region Shared methods
    public function updateTimestamps(): void {
        $this->updatedAt = new DateTime();
        if (!$this->createdAt){
            $this->createdAt = new DateTime();
        }
    }
    #endregion
}