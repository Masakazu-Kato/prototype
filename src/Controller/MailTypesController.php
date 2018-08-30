<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MailTypes Controller
 *
 * @property \App\Model\Table\MailTypesTable $MailTypes
 *
 * @method \App\Model\Entity\MailType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MailTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mailTypes = $this->paginate($this->MailTypes);

        $this->set(compact('mailTypes'));
        $this->set('sidebarName', 'Settings/sidebar');
    }

}
