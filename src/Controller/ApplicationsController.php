<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 *
 * @method \App\Model\Entity\Application[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationsController extends AppController
{

    public $components = ['Utility'];

    public $paginate = [
        'limit' => 50,
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $applications = $this->paginate($this->Applications);

        $this->set(compact('applications'));
        $this->set('sidebarName', 'Settings/sidebar');
        $this->set('enable', $this->Utility->enable());
    }

}
