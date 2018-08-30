<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Utility component
 */
class UtilityComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];


    /**
     * 有効・無効
     * @param string $value
     * @return string
     */
    public function enable(string $value = null)
    {
        $list = [
            ''  => '未聴取',
            0   => '無効',
            1   => '有効'
        ];

        if($value) {
            $response = $list[$value];
        } else {
            $response = $list;
        }
        return $list;
    }

    public function caleHourMinutes(string $value = null)
    {
        $response = '';
        if($value) {
            $response = sprintf("%02d時間 %02d分", floor($value/60), $value%60);
        }
        return $response;
    }

    /**
     * 年齢
     * @param type $date
     * @return type
     */
    public function calcAge($date)
    {
        $today = date('Ymd');
        $birthdate = date('Ymd', strtotime($date));
        return (int) floor(($today - $birthdate) / 10000);
    }

}
