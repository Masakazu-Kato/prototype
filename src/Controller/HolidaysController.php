<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Holidays Controller
 *
 * @property \App\Model\Table\HolidaysTable $Holidays
 *
 * @method \App\Model\Entity\Holiday[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HolidaysController extends AppController
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
        $holidays = $this->paginate($this->Holidays);

        $this->set(compact('holidays'));
        $this->set('sidebarName', 'Settings/sidebar');
    }

}
