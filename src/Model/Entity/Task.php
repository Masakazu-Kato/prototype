<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 */
class Task extends Entity
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
        'start' => true,
        'end' => true,
        'user_id' => true,
        'assign_id' => true,
        'student_id' => true,
        'assigned' => true,
        'task_status_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'assign' => true,
        'student' => true,
        'task_status' => true
    ];
}
