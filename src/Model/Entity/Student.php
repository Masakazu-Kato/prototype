<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 */
class Student extends Entity
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
        'lastname' => true,
        'firstname' => true,
        'lastname_kana' => true,
        'firstname_kana' => true,
        'email' => true,
        'phone' => true,

        'postcode' => true,
        'prefecture_id' => true,
        'municipality' => true,
        'street' => true,
        'building' => true,
        'birthday' => true,

        'enable' => true,
        'token' => true,
        'created' => true,
        'modified' => true,
        'mails' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token'
    ];

    /**
     *
     * @return type
     */
    protected function _getFullName()
    {
      return $this->_properties['lastname'] . $this->_properties['firstname'];
    }

    /**
     *
     * @return type
     */
    protected function _getFullNameKana()
    {
      return $this->_properties['lastname_kana'] . $this->_properties['firstname_kana'];
    }

}
