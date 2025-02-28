<?php declare(strict_types=1);

#region Namespace
namespace App\Repository\Game;
#endregion

#region Project Repositories
use App\Repository\Shared\BaseRepository;
#endregion
#region ORM Classes
use Doctrine\Persistence\ManagerRegistry;
#endregion
#region Game Objects
use App\Entity\Game\Answer;
#endregion

final class AnswerRepository extends BaseRepository {
    public function __construct(ManagerRegistry $managerRegistry) {
        #region Constructor
        parent::__construct(
            $managerRegistry, 
            Answer::class
        );
        #endregion
    }
}