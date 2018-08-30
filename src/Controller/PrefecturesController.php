<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prefectures Controller
 *
 * @property \App\Model\Table\PrefecturesTable $Prefectures
 *
 * @method \App\Model\Entity\Prefecture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrefecturesController extends AppController
{

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
        $prefectures = $this->paginate($this->Prefectures);

        $this->set(compact('prefectures'));
        $this->set('sidebarName', 'Settings/sidebar');
    }

}
