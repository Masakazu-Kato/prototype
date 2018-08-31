<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Event\EventDispatcherTrait;

/**
 * WebExams Controller
 *
 * @property \App\Model\Table\WebExamsTable $WebExams
 *
 * @method \App\Model\Entity\WebExam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WebExamsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([
            'index', 'view', 'login', 'logout',
            'app',
            'signin', 'signout'
        ]);
    }

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
        $this->viewBuilder()->layout('webexam');
        /*
        $this->paginate = [
            'contain' => ['Exams', 'Users']
        ];
        $webExams = $this->paginate($this->WebExams);

        $this->set(compact('webExams'));
        */
    }

    /**
     * View method
     *
     * @param string|null $id Web Exam id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('webexam');
        /*
        $webExam = $this->WebExams->get($id, [
            'contain' => ['Exams', 'Users']
        ]);

        $this->set('webExam', $webExam);
        */
    }


    public function app()
    {
        // http://computer-technology.hateblo.jp/entry/20150717/p1
        $this->viewBuilder()->layout('webexam');
        /*
        $this->paginate = [
            'contain' => ['Exams', 'Users']
        ];
        $webExams = $this->paginate($this->WebExams);

        $this->set(compact('webExams'));
        */
    }


    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('ユーザ名もしくはパスワードが間違っています'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * signinアクション
     */
    public function signin()
    {
        /*
        if($this->Auth->user('id')) {
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error('ユーザー名またはパスワードが不正です。');
        }
        */

        $this->viewBuilder()->setLayout('');
    }

    /**
     * signoutアクション
     */
    public function signout()
    {
        $this->Flash->success('ログアウトしました。');
        return $this->redirect($this->Auth->logout());
    }

}
