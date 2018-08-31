<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WebExam Entity
 *
 * @property int $id
 * @property string $name
 * @property int $exam_id
 * @property int $user_id
 * @property int $minutes
 * @property \Cake\I18n\FrozenTime $start
 * @property \Cake\I18n\FrozenTime $end
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Exam $exam
 * @property \App\Model\Entity\User $user
 */
class WebExam extends Entity
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
        'exam_id' => true,
        'user_id' => true,
        'minutes' => true,
        'start' => true,
        'end' => true,
        'created' => true,
        'modified' => true,
        'exam' => true,
        'user' => true
    ];
}
