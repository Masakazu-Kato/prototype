<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Event\EventDispatcherTrait;

/**
 * Exams Controller
 *
 *
 * @method \App\Model\Entity\Exam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamsController extends AppController
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
            'contain' => ['Surveys'],
            'limit' => 50,
        ];
        $exams = $this->paginate($this->Exams);
        $this->set(compact('exams'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => ['Prefectures','Surveys']
        ]);
        $this->set('exam', $exam);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exam = $this->Exams->newEntity();
        if ($this->request->is('post')) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('試験を追加しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('試験の追加に失敗しました。もう一度やり直してください。'));
        }
        $prefectures = $this->Exams->Prefectures->find('list', [
            'limit' => 200
        ]);
        $surveys = $this->Exams->Surveys->find('list', [
            'limit' => 200
        ]);
        $this->set(compact('exam','prefectures','surveys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('試験を更新しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('試験の更新に失敗しました。もう一度やり直してください。'));
        }
        $prefectures = $this->Exams->Prefectures->find('list', [
            'limit' => 200
        ]);
        $surveys = $this->Exams->Surveys->find('list', [
            'limit' => 200
        ]);

        $this->set(compact('exam','prefectures','surveys'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exam = $this->Exams->get($id);
        if ($this->Exams->delete($exam)) {
            $this->Flash->success(__('試験を削除しました。'));
        } else {
            $this->Flash->error(__('試験の削除に失敗しました。もう一度やり直してください。'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
