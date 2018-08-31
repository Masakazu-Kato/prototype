<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Event\EventDispatcherTrait;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
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
            'contain' => ['Assigns', 'Students', 'TaskStatuses', 'Users'],
            'limit' => 50,
        ];
        $tasks = $this->paginate($this->Tasks);
        $this->set(compact('tasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Assigns', 'Students', 'TaskStatuses', 'Users']
        ]);
        $this->set('task', $task);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('タスクを追加しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('タスクの追加に失敗しました。もう一度やり直してください。'));
        }
        $users = $this->Tasks->Users->find('list', [
            'limit' => 200
        ]);
        $assigns = $this->Tasks->Assigns->find('list', [
            'limit' => 200
        ]);
        $students = $this->Tasks->Students->find('list', [
            'limit' => 200
        ]);
        $taskStatuses = $this->Tasks->TaskStatuses->find('list', [
            'limit' => 200
        ]);
        $this->set(compact('task', 'users', 'assigns', 'students', 'taskStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Assigns', 'Students', 'TaskStatuses', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('タスクを更新しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('タスクの更新に失敗しました。もう一度やり直してください。'));
        }
        $users = $this->Tasks->Users->find('list', [
            'limit' => 200
        ]);
        $assigns = $this->Tasks->Assigns->find('list', [
            'limit' => 200
        ]);
        $students = $this->Tasks->Students->find('list', [
            'limit' => 200
        ]);
        $taskStatuses = $this->Tasks->TaskStatuses->find('list', [
            'limit' => 200
        ]);
        $this->set(compact('task', 'users', 'assigns', 'students', 'taskStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('タスクを削除しました。'));
        } else {
            $this->Flash->error(__('タスクの削除に失敗しました。もう一度やり直してください。'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
