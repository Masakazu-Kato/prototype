<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Event\EventDispatcherTrait;

/**
 * MailTemplates Controller
 *
 * @property \App\Model\Table\MailTemplatesTable $MailTemplates
 *
 * @method \App\Model\Entity\MailTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MailTemplatesController extends AppController
{

    public $components = ['Utility'];

    public $paginate = [
        'limit' => 50,
    ];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->set('sidebarName', 'Settings/sidebar');
        $this->set('enable', $this->Utility->enable());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mailTemplates = $this->paginate($this->MailTemplates);
        $this->set(compact('mailTemplates'));
    }

    /**
     * View method
     *
     * @param string|null $id Mail Template id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mailTemplate = $this->MailTemplates->get($id, [
            'contain' => []
        ]);
        $this->set('mailTemplate', $mailTemplate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mailTemplate = $this->MailTemplates->newEntity();
        if ($this->request->is('post')) {
            $mailTemplate = $this->MailTemplates->patchEntity($mailTemplate, $this->request->getData());
            if ($this->MailTemplates->save($mailTemplate)) {
                $this->Flash->success(__('メールテンプレートを追加しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('メールテンプレートの追加に失敗しました。もう一度やり直してください。'));
        }
        $this->set(compact('mailTemplate'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mail Template id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mailTemplate = $this->MailTemplates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mailTemplate = $this->MailTemplates->patchEntity($mailTemplate, $this->request->getData());
            if ($this->MailTemplates->save($mailTemplate)) {
                $this->Flash->success(__('メールテンプレートを更新しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('メールテンプレートの更新に失敗しました。もう一度やり直してください。'));
        }
        $this->set(compact('mailTemplate'));
        $this->set('enable', $this->Utility->enable());
    }

    /**
     * Delete method
     *
     * @param string|null $id Mail Template id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mailTemplate = $this->MailTemplates->get($id);
        if ($this->MailTemplates->delete($mailTemplate)) {
            $this->Flash->success(__('メールテンプレートを削除しました。'));
        } else {
            $this->Flash->error(__('メールテンプレートの削除に失敗しました。もう一度やり直してください。'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
