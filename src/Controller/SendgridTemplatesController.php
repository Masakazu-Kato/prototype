<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SendgridTemplates Controller
 *
 * @property \App\Model\Table\SendgridTemplatesTable $SendgridTemplates
 *
 * @method \App\Model\Entity\SendgridTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SendgridTemplatesController extends AppController
{

    public $paginate = [
        'limit' => 50
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sendgridTemplates = $this->paginate($this->SendgridTemplates);

        $this->set(compact('sendgridTemplates'));
        $this->set('sidebarName', 'Settings/sidebar');
    }

    /**
     * View method
     *
     * @param string|null $id Sendgrid Template id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sendgridTemplate = $this->SendgridTemplates->get($id, [
            'contain' => []
        ]);

        $this->set('sendgridTemplate', $sendgridTemplate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sendgridTemplate = $this->SendgridTemplates->newEntity();
        if ($this->request->is('post')) {
            $sendgridTemplate = $this->SendgridTemplates->patchEntity($sendgridTemplate, $this->request->getData());
            if ($this->SendgridTemplates->save($sendgridTemplate)) {
                $this->Flash->success(__('The sendgrid template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sendgrid template could not be saved. Please, try again.'));
        }
        $this->set(compact('sendgridTemplate'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sendgrid Template id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sendgridTemplate = $this->SendgridTemplates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sendgridTemplate = $this->SendgridTemplates->patchEntity($sendgridTemplate, $this->request->getData());
            if ($this->SendgridTemplates->save($sendgridTemplate)) {
                $this->Flash->success(__('SendGridテンプレート情報を更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sendgrid template could not be saved. Please, try again.'));
        }
        $this->set(compact('sendgridTemplate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sendgrid Template id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sendgridTemplate = $this->SendgridTemplates->get($id);
        if ($this->SendgridTemplates->delete($sendgridTemplate)) {
            $this->Flash->success(__('The sendgrid template has been deleted.'));
        } else {
            $this->Flash->error(__('The sendgrid template could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
