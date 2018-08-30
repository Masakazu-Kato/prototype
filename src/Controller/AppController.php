<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\Entity\User;
use App\Model\Table\UsersTable;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function __get($name)
    {
        switch ($name) {
            case 'currentUser':
                return $this->viewVars['currentUser'] ?? null;
        }

        return parent::__get($name);
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        // $this->_initAuthComponent();
        // $this->_initCurrentUser();
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        // $this->loadComponent('Csrf');
    }

    protected function _initAuthComponent()
    {
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'signin'
            ],
            'unauthorizedRedirect' => $this->referer()
        ]);

        return $this;
    }

    protected function _initCurrentUser()
    {
        $user = $this->Auth->user();

        if ($user) {
            $user = new User($user);
            $vendor = $user->getVendor();
            if ($vendor !== null) $user->vendor = $vendor;
            $this->set('currentUser', $user);
        }

        return $this;
    }

    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates'],
    ];

}
