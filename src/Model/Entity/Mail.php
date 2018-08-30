<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mail Entity
 */
class Mail extends Entity
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
        'student_id' => true,
        'user_id' => true,
        'subject' => true,
        'type' => true,
        'from' => true,
        'to' => true,
        'cc' => true,
        'bcc' => true,
        'body' => true,
        'raw' => true,
        'status' => true,
        'mail_type_id' => true,
        'error_code' => true,
        'enable' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'mail_type' => true
    ];
}
