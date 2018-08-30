<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SurveyAnswer Entity
 */
class SurveyAnswer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'survey_question_id' => true,
        'choices' => true,
        'quiz_options' => true,
        'score' => true,
        'visible' => true,
        'text' => true,
        'position' => true,
        'weight' => true,
        'is_na' => true,
        'origin_id' => true,
        'created' => true,
        'modified' => true,
        'survey_question' => true,
        'origin_answer' => true
    ];

    /**
     *
     * @param type $values
     */
    public function setApiValues($values)
    {

        \Cake\Log\Log::debug($values);

        foreach ((array)$values as $key => $value) {
            if ($value === null || $value === '') continue;
            switch ($key) {
                case 'survey_question_id':
                case 'choices':
                // case 'quiz_options':
                case 'score':
                case 'visible':
                case 'text':
                case 'position':
                case 'weight':
                case 'is_na':
                    $this->$key = $value;
                    break;
                case 'id':
                    $this->origin_id = $value;
                    break;
                case 'date_created':
                    $this->created = $value;
                    break;
                case 'date_modified':
                    $this->modified = $value;
                    break;
            }
        }
    }

}
