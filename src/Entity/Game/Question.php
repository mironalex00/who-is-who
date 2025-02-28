<?php declare(strict_types=1);

#region Namespace
namespace App\Entity\Game;
#endregion

#region ORM Definitions
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
#endregion
#region ORM Objects
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
#endregion
#region Game Objects
use App\Contracts\Game\IQuestion;
use App\Contracts\Game\IAnswer;
use App\Shared\Value;
#endregion

#[Entity]
#[Table(name: "question")]
final class Question extends Value implements IQuestion {
    #region Properties
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;
    #[OneToMany(
        targetEntity: IAnswer::class,
        mappedBy: 'question',
        cascade: ['persist'],
    )]
    private Collection $answers;
    #endregion
    #region Constructor
    public function __construct(
        #[Column(name: "question_str", type: Types::STRING, length: 255, nullable: false, unique: true, options: ["comment" => "The question string"])]
        private String $question_str,
        IAnswer... $answers
    ) {
        $this->answers = new ArrayCollection();
        for( $i = 0; $i < count($answers); $i++ ) {
            $this->answers->add($answers[$i]);
        }
    }
    #endregion
    #region Question Methods
    public function getQuestion(): string {
        return $this->question_str;
    }
    #endregion
    #region Answers
    public function addAnswer(IAnswer $answer): void {
        if (!$this->answers->contains($answer)) {
            $this->answers->add($answer);
        }
    }
    #endregion
    #region Validations 
    public function validate(IAnswer $answer): bool {
        for($i = 0; $i < $this->answers->count(); $i++ ) {
            if($this->answers->get($i)->equals($answer)){
                return true;
            }
        }
        return false;
    }
    #endregion
}