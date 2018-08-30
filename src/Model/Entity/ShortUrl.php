<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShortUrl Entity
 *
 * @property int $id
 * @property string $url
 * @property string $long_url
 * @property int $status_code
 * @property string $status_text
 * @property string $hash
 * @property string $global_hash
 * @property int $new_hash
 * @property int $student_id
 * @property int $survey_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Survey $survey
 */
class ShortUrl extends Entity
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
        'url' => true,
        'long_url' => true,
        'status_code' => true,
        'status_text' => true,
        'hash' => true,
        'global_hash' => true,
        'new_hash' => true,
        'student_id' => true,
        'survey_id' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'survey' => true
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
                case 'url':
                case 'long_url':
                case 'status_code':
                case 'status_text':
                case 'hash':
                case 'global_hash':
                case 'new_hash':
                case 'student_id':
                case 'survey_id':
                    $this->$key = $value;
                    break;
                case 'created':
                case 'modified':
                    $this->$key = date('Y-m-d H:i:s');
                    break;
            }
        }
    }

}
