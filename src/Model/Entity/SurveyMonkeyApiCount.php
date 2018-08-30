<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SurveyMonkeyApiCount Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property int $global_minute_limit
 * @property int $global_minute_remaining
 * @property int $global_minute_reset
 * @property int $global_day_limit
 * @property int $global_day_remaining
 * @property int $global_day_reset
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class SurveyMonkeyApiCount extends Entity
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
        'global_minute_limit' => true,
        'global_minute_remaining' => true,
        'global_minute_reset' => true,
        'global_day_limit' => true,
        'global_day_remaining' => true,
        'global_day_reset' => true,
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
                case 'global_minute_limit':
                case 'global_minute_remaining':
                case 'global_minute_reset':
                case 'global_day_limit':
                case 'global_day_remaining':
                case 'global_day_reset':
                    $this->$key = $value;
                    break;
            }
        }
    }

}
