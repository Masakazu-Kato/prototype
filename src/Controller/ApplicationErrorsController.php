<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApplicationErrors Controller
 *
 * @property \App\Model\Table\ApplicationErrorsTable $ApplicationErrors
 *
 * @method \App\Model\Entity\ApplicationError[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationErrorsController extends AppController
{

    public $paginate = [
        'contain' => ['Applications'],
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
            'contain' => ['Applications'],
            'limit' => 50
        ];
        $applicationErrors = $this->paginate($this->ApplicationErrors);

        $this->set(compact('applicationErrors'));
    }

    /**
     * View method
     *
     * @param string|null $id Application Error id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationError = $this->ApplicationErrors->get($id, [
            'contain' => ['Applications']
        ]);

        $this->set('applicationError', $applicationError);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicationError = $this->ApplicationErrors->newEntity();
        if ($this->request->is('post')) {
            $applicationError = $this->ApplicationErrors->patchEntity($applicationError, $this->request->getData());
            if ($this->ApplicationErrors->save($applicationError)) {
                $this->Flash->success(__('The application error has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application error could not be saved. Please, try again.'));
        }
        $applications = $this->ApplicationErrors->Applications->find('list', ['limit' => 200]);
        $this->set(compact('applicationError', 'applications'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Application Error id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicationError = $this->ApplicationErrors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicationError = $this->ApplicationErrors->patchEntity($applicationError, $this->request->getData());
            if ($this->ApplicationErrors->save($applicationError)) {
                $this->Flash->success(__('The application error has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application error could not be saved. Please, try again.'));
        }
        $applications = $this->ApplicationErrors->Applications->find('list', ['limit' => 200]);
        $this->set(compact('applicationError', 'applications'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Application Error id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationError = $this->ApplicationErrors->get($id);
        if ($this->ApplicationErrors->delete($applicationError)) {
            $this->Flash->success(__('The application error has been deleted.'));
        } else {
            $this->Flash->error(__('The application error could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
