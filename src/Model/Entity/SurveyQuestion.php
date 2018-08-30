<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SurveyQuestion Entity
 */
class SurveyQuestion extends Entity
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
        'sorting' => true,
        'survey_page_id' => true,
        'family' => true,
        'subtype' => true,
        'required' => true,
        'visible' => true,
        'href' => true,
        'headings' => true,
        'position' => true,
        'validation' => true,
        'forced_ranking' => true,
        'origin_question_id' => true,
        'created' => true,
        'modified' => true,
        'survey_page' => true,
        'origin_question' => true,
        'survey_answers' => true
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
                case 'survey_page_id':
                case 'sorting':
                case 'family':
                case 'subtype':
                case 'required':
                case 'visible':
                case 'href':
                case 'headings':
                case 'position':
                case 'validation':
                case 'forced_ranking':
                    $this->$key = $value;
                    break;
                case 'id':
                    $this->origin_question_id = $value;
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
