<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnswerResult Entity
 */
class AnswerResult extends Entity
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
        'answer_id' => true,
        'question_id' => true,
        'type' => true,
        'value' => true,
        'created' => true,
        'modified' => true,
        'answer' => true,
        'question' => true
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
                case 'type':
                case 'value':
                    $this->$key = $value;
                    break;
                case 'id':
                    $this->answer_id = $value;
                    break;
                case 'date_created':
                    $this->created = date('Y-m-d H:i:s', strtotime($value));
                    break;
                case 'date_modified':
                    $this->modified = date('Y-m-d H:i:s', strtotime($value));
                    break;
            }
        }
    }


}
