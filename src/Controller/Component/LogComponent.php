<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

use Cake\Log\Log;

/**
 * Log component
 */
class LogComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     *
     * @param type $params
     * @return type
     */
    public function api($params) {
        Log::debug($params, ['scope' => ['api']]);
        return;
    }

    /**
     *
     * @param type $params
     * @return type
     */
    public function shell($params) {
        Log::debug($params, ['scope' => ['shell']]);
        return;
    }

}
