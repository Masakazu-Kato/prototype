<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SendgridTemplate Entity
 *
 * @property int $id
 * @property string $name
 * @property string $generation
 * @property string $version_id
 * @property string $template_id
 * @property int $active
 * @property string $version_name
 * @property string $subject
 * @property string $editor
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property string $origin_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Version $version
 * @property \App\Model\Entity\Template $template
 * @property \App\Model\Entity\Origin $origin
 */
class SendgridTemplate extends Entity
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
        'generation' => true,
        'version_id' => true,
        'template_id' => true,
        'active' => true,
        'version_name' => true,
        'subject' => true,
        'editor' => true,
        'updated_at' => true,
        'origin_id' => true,
        'created' => true,
        'modified' => true,
        'version' => true,
        'template' => true,
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
                case 'generation':
                case 'version_id':
                case 'template_id':
                case 'active':
                case 'version_name':
                case 'subject':
                case 'editor':
                case 'updated_at':
                case 'origin_id':
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
