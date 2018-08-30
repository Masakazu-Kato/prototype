<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShortMessage Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $student_id
 * @property string $body
 * @property string $raw
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Student $student
 */
class ShortMessage extends Entity
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
        'user_id' => true,
        'student_id' => true,
        'body' => true,
        'raw' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'student' => true
    ];
}
