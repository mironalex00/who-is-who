<?php declare(strict_types=1);

#region Namespace
namespace App\Repository\Shared;
#endregion

#region ORM Classes
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Mapping\ClassMetadata;
#endregion
#region Game Objects
use App\Contracts\Shared\IValue;
#endregion
#region Libraries Classes
use Phauthentic\Optional\Optional;
#endregion
#region PHP Classes
use Exception;
use InvalidArgumentException;
#endregion

abstract class BaseRepository extends ServiceEntityRepository {
    #region Properties
    private EntityManagerInterface $entityManager;
    private ClassMetadata $class;
    #endregion
    #region Constructor
    public function __construct(
        ManagerRegistry $managerRegistry,
        private string $className
    ) {
        $this->entityManager = $managerRegistry->getManager();
        $this->class = $this->entityManager->getClassMetadata($className);
        parent::__construct($this->entityManager, $this->class);
    }
    #endregion
    #region Create Methods
    public function create(IValue $entity): Optional {
        return  Optional::of(
            $this->entityManager->wrapInTransaction(function ($em) use ($entity) {
                $this->validateEntity($entity);
                $em->persist($entity);
                return $entity;
            })
        );
    }
    #endregion
    #region Retrive Methods
    public function findById(string|int $id): Optional {
        return Optional::of($this->find($id))->orElseThrow(function () use ($id) {
            $className = basename($this->className);
            throw new Exception("$className '$id' not found");
        });
    }
    #endregion
    #region Update Methods
    public function update(IValue $entity): Optional {
        return  Optional::of(
            $this->entityManager->wrapInTransaction(function ($em) use ($entity) {
                $this->validateEntity($entity);
                $em->persist($entity);
                return $entity;
            })
        );
    }
    #endregion
    #region Delete Methods
    public function delete(object $entity): void {
        $this->validateEntityType($entity);
        $em = $this->getEntityManager();
        $em->remove($entity);
        $em->flush();
    }
    #endregion
    #region Private Methods
    private function validateEntity(IValue $entity): void {
        if(!$entity instanceof $this->className) {
            $expected = basename($this->className);
            $actual = basename(get_class($entity));
            throw new InvalidArgumentException(
                "Invalid entity type. Expected: $expected, Actual: $actual"
            );
        }
    }
    #endregion
}