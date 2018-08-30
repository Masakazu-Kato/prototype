<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SurveyPage Entity
 */
class SurveyPage extends Entity
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
        'survey_id' => true,
        'title' => true,
        'href' => true,
        'description' => true,
        'position' => true,
        'question_count' => true,
        'origin_id' => true,
        'created' => true,
        'modified' => true,
        'survey' => true,
        'origin_page' => true,
        'survey_questions' => true
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
                case 'href':
                case 'description':
                case 'title':
                case 'position':
                case 'question_count':
                case 'survey_id':
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
