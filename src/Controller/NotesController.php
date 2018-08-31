<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Event\EventDispatcherTrait;

/**
 * Notes Controller
 *
 * @property \App\Model\Table\NotesTable $Notes
 *
 * @method \App\Model\Entity\Note[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

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
        $notes = $this->paginate($this->Notes);
        $this->set(compact('notes'));
    }

    /**
     * View method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $note = $this->Notes->get($id, [
            'contain' => ['Users', 'Students']
        ]);
        $this->set('note', $note);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $note = $this->Notes->newEntity();
        if ($this->request->is('post')) {
            $note = $this->Notes->patchEntity($note, $this->request->getData());
            if ($this->Notes->save($note)) {
                $this->Flash->success(__('ノートを追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('ノートの追加に失敗しました。もう一度やり直してください。'));
        }
        $users = $this->Notes->Users->find('list', [
            'limit' => 200
        ]);
        $students = $this->Notes->Students->find('list', [
            'limit' => 200
        ]);
        $this->set(compact('note', 'users', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $note = $this->Notes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $note = $this->Notes->patchEntity($note, $this->request->getData());
            if ($this->Notes->save($note)) {
                $this->Flash->success(__('ノートを更新しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('ノートの更新に失敗しました。もう一度やり直してください。'));
        }
        $users = $this->Notes->Users->find('list', [
            'limit' => 200
        ]);
        $students = $this->Notes->Students->find('list', [
            'limit' => 200
        ]);
        $this->set(compact('note', 'users', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $note = $this->Notes->get($id);
        if ($this->Notes->delete($note)) {
            $this->Flash->success(__('ノートを削除しました。'));
        } else {
            $this->Flash->error(__('ノートの削除に失敗しました。もう一度やり直してください。'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
