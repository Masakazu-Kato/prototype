<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exam Entity
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $survey_id
 * @property \Cake\I18n\FrozenTime $exam_due
 * @property \Cake\I18n\FrozenTime $exam_start
 * @property \Cake\I18n\FrozenTime $exam_end
 * @property int $number
 * @property string $email
 * @property string $phone
 * @property string $postcode
 * @property int $prefecture_id
 * @property string $municipality
 * @property string $street
 * @property string $building
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Survey $survey
 * @property \App\Model\Entity\Prefecture $prefecture
 */
class Exam extends Entity
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
        'name' => true,
        'text' => true,
        'survey_id' => true,
        'exam_due' => true,
        'exam_start' => true,
        'exam_end' => true,
        'exam_minute' => true,
        'number' => true,
        'email' => true,
        'phone' => true,
        'postcode' => true,
        'prefecture_id' => true,
        'municipality' => true,
        'street' => true,
        'building' => true,
        'created' => true,
        'modified' => true,
        'survey' => true,
        'prefecture' => true
    ];
}
