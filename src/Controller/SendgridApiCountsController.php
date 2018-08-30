<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SendgridApiCounts Controller
 *
 * @property \App\Model\Table\SendgridApiCountsTable $SendgridApiCounts
 *
 * @method \App\Model\Entity\SendgridApiCount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SendgridApiCountsController extends AppController
{

    public $paginate = [
        'limit' => 50,
        'order' => [
            'SendgridApiCounts.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sendgridApiCounts = $this->paginate($this->SendgridApiCounts);

        $this->set(compact('sendgridApiCounts'));
        $this->set('sidebarName', 'Settings/sidebar');
    }

}
