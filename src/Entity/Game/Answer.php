<?php declare(strict_types=1);

#region Namespace
namespace App\Entity\Game;
#endregion

#region Project Repositories
use App\Repositories\Game\AnswerRepository;
#endregion 
#region ORM Definitions
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
#endregion
#region Game Objects
use App\Contracts\Shared\IValue;
use App\Contracts\Game\IAnswer;
use App\Shared\Value;
#endregion

#[Entity(repositoryClass: AnswerRepository::class)]
#[Table(name: "answer")]
final class Answer extends Value implements IAnswer {
    #region Properties
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;
    #endregion
    #region Constructor
    public function __construct(
        #[Column(name: "answer_str", type: Types::STRING, length: 255, nullable: false, options: ["comment" => "The answer string"])]
        private Bool|Int|Float|String $answer_str,
        #[Column(name: "is_correct", type: Types::BOOLEAN, nullable: false, options: ["comment" => "Is the answer correct?"])] 
        private bool $isCorrect = false
    ) {}
    #endregion
    #region Answer Methods
    public function getAnswer(): Bool|Int|Float|String {    return  $this->answer_str;   }
    public function isCorrect(): bool {    return  $this->isCorrect;   }
    #endregion
    #region Validations
    public function equals(IValue $answer): bool {
        if ($answer instanceof IAnswer) {
            if($this->isCorrect()){
                return $this->getAnswer() === $answer->getAnswer();
            }
        }
        return false;
    }
    #endregion
}