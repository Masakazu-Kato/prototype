<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mails Controller
 *
 *
 * @method \App\Model\Entity\Mail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MailsController extends AppController
{

    public $components = ['Utility'];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MailTypes','Students'],
            'limit' => 50,
        ];

        $mails = $this->paginate($this->Mails);

        $this->set(compact('mails'));
        $this->set('enable', $this->Utility->enable());
    }

    /**
     * View method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mail = $this->Mails->get($id, [
            'contain' => ['MailTemplates','MailTypes','Students']
        ]);

        $this->set('mail', $mail);
        $this->set('enable', $this->Utility->enable());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mail = $this->Mails->newEntity();
        if ($this->request->is('post')) {
            $mail = $this->Mails->patchEntity($mail, $this->request->getData());
            if ($this->Mails->save($mail)) {
                $this->Flash->success(__('The mail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mail could not be saved. Please, try again.'));
        }
        $this->set(compact('mail'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mail = $this->Mails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mail = $this->Mails->patchEntity($mail, $this->request->getData());
            if ($this->Mails->save($mail)) {
                $this->Flash->success(__('メール情報を更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mail could not be saved. Please, try again.'));
        }
        $this->set(compact('mail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mail = $this->Mails->get($id);
        if ($this->Mails->delete($mail)) {
            $this->Flash->success(__('The mail has been deleted.'));
        } else {
            $this->Flash->error(__('The mail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
