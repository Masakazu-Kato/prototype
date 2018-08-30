<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity
 */
class Answer extends Entity
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
        'response_status' => true,
        'ip_address' => true,
        'total_time' => true,
        'href' => true,
        'analyze_url' => true,
        'edit_url' => true,
        'recipient_id' => true,
        'collector_id' => true,
        'collection_mode' => true,
        'custom_value' => true,
        'custom_variables' => true,
        'page_path' => true,
        'logic_path' => true,
        'metadata' => true,
        'origin_id' => true,
        'origin_survey_id' => true,
        'created' => true,
        'modified' => true,
        'recipient' => true,
        'collector' => true,
        'origin' => true,
        'origin_survey' => true
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
                case 'response_status':
                case 'ip_address':
                case 'total_time':
                case 'href':
                case 'analyze_url':
                case 'edit_url':
                case 'recipient_id':
                case 'collector_id':
                case 'collection_mode':
                    $this->$key = $value;
                    break;
                case 'id':
                    $this->origin_id = $value;
                    break;
                case 'survey_id':
                    $this->origin_survey_id = $value;
                    break;
                case 'date_created':
                    $this->created = date('Y-m-d H:i:s', strtotime($value));
                    break;
                case 'date_modified':
                    $this->modified = date('Y-m-d H:i:s', strtotime($value));
                    break;
                // 対応
                case 'custom_value':
                case 'custom_variables':
                case 'page_path':
                case 'logic_path':
                case 'metadata':
                    $this->$key = '';
                    break;
            }
        }
    }

}
