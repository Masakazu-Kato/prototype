<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Survey Entity
 */
class Survey extends Entity
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
        'title' => true,
        'href' => true,
        'page_count' => true,
        'question_count' => true,
        'response_count' => true,
        'collect_url' => true,
        'preview' => true,
        'edit_url' => true,
        'analyze_url' => true,
        'summary_url' => true,
        'is_owner' => true,
        'footer' => true,
        'buttons_text' => true,
        'folder_id' => true,
        'language' => true,
        'custom_variables' => true,
        'category' => true,
        'nickname' => true,
        'origin_id' => true,
        'created' => true,
        'modified' => true,
        'folder' => true,
        'origin_survey' => true,
        'survey_pages' => true
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
                case 'title':
                case 'href':
                case 'page_count':
                case 'question_count':
                case 'response_count':
                case 'collect_url':
                case 'preview':
                case 'edit_url':
                case 'analyze_url':
                case 'summary_url':
                case 'is_owner':
                case 'footer':
                //case 'buttons_text':
                case 'folder_id':
                case 'language':
                // case 'custom_variables':
                case 'category':
                case 'nickname':
                    $this->$key = $value;
                    break;
                case 'id':
                    $this->origin_id = $value;
                    break;
                case 'date_created':
                    $this->created = $value;
                    break;
                case 'date_modified':
                    $this->modified = $value;
                    break;
                // ここは要確認すること
                case 'buttons_text':
                case 'custom_variables':
                    $this->$key = '';
                    break;
            }
        }
    }

}
