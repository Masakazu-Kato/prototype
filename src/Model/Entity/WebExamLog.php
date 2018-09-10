<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WebExamLog Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property int $student_id
 * @property int $user_id
 * @property int $cycle
 * @property int $seconds
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Exam $exam
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\User $user
 */
class WebExamLog extends Entity
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
        'exam_id' => true,
        'student_id' => true,
        'user_id' => true,
        'cycle' => true,
        'seconds' => true,
        'created' => true,
        'modified' => true,
        'exam' => true,
        'student' => true,
        'user' => true
    ];
}
