<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SurveyCategory Entity
 *
 * @property int $id
 * @property string $name
 * @property string $origin_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Origin $origin
 */
class SurveyCategory extends Entity
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
        'origin_id' => true,
        'created' => true,
        'modified' => true,
        'origin' => true
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
                case 'name':
                    $this->$key = $value;
                    break;
                case 'id':
                    $this->origin_id = $value;
                    break;
            }
        }
    }

}
