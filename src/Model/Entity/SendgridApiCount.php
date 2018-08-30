<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SendgridApiCount Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property int $limit
 * @property int $remaining
 * @property int $reset
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class SendgridApiCount extends Entity
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
        'date' => true,
        'day_limit' => true,
        'day_remaining' => true,
        'dat_reset' => true,
        'created' => true,
        'modified' => true
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
                case 'date':
                case 'day_limit':
                case 'day_remaining':
                case 'day_reset':
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
