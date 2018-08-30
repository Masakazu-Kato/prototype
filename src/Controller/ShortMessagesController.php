<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShortMessages Controller
 *
 * @property \App\Model\Table\ShortMessagesTable $ShortMessages
 *
 * @method \App\Model\Entity\ShortMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShortMessagesController extends AppController
{

    public $paginate = [
        'contain' => ['Users', 'Students'],
        'limit' => 50,
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Students'],
            'limit' => 50
        ];
        $shortMessages = $this->paginate($this->ShortMessages);

        $this->set(compact('shortMessages'));
    }

    /**
     * View method
     *
     * @param string|null $id Short Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shortMessage = $this->ShortMessages->get($id, [
            'contain' => ['Users', 'Students'],
            'limit' => 50
        ]);

        $this->set('shortMessage', $shortMessage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shortMessage = $this->ShortMessages->newEntity();
        if ($this->request->is('post')) {
            $shortMessage = $this->ShortMessages->patchEntity($shortMessage, $this->request->getData());
            if ($this->ShortMessages->save($shortMessage)) {
                $this->Flash->success(__('The short message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short message could not be saved. Please, try again.'));
        }
        $users = $this->ShortMessages->Users->find('list', ['limit' => 200]);
        $students = $this->ShortMessages->Students->find('list', ['limit' => 200]);
        $this->set(compact('shortMessage', 'users', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Short Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shortMessage = $this->ShortMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shortMessage = $this->ShortMessages->patchEntity($shortMessage, $this->request->getData());
            if ($this->ShortMessages->save($shortMessage)) {
                $this->Flash->success(__('The short message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short message could not be saved. Please, try again.'));
        }
        $users = $this->ShortMessages->Users->find('list', ['limit' => 200]);
        $students = $this->ShortMessages->Students->find('list', ['limit' => 200]);
        $this->set(compact('shortMessage', 'users', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Short Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shortMessage = $this->ShortMessages->get($id);
        if ($this->ShortMessages->delete($shortMessage)) {
            $this->Flash->success(__('The short message has been deleted.'));
        } else {
            $this->Flash->error(__('The short message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
