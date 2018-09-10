<?php
namespace App\Controller\Api;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Event\EventDispatcherTrait;
use Cake\Http\Response;
use Cake\Datasource\ConnectionManager;

/**
 * WebExams Controller
 */
class WebExamsController extends AppController
{
    use EventDispatcherTrait;

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['timer']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        switch ($this->request->getParam('action')) {
            case 'timer':
                $this->getEventManager()->off($this->Csrf);
                break;
        }

    }

/*
    public function isAuthorized($user = null)
    {
        return true;
    }
*/

    public function timer()
    {
        $this->loadModel('WebExamLogs');

        $data = [
            'exam_id' => 1,
            'student_id' => 0,
            'user_id' => 1,
            'cycle' => 1,
            'seconds' => 5,
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
        ];
        $webExamLog = $this->WebExamLogs->newEntity($data);
        $this->WebExamLogs->save($webExamLog);

        $data = [
            'error' => true,
            'message' => '',
            'duplicated' => false,
            'data' => '',
        ];
/*
        try {
            if (! $this->request->is('post')) {
                throw new \Exception('不正なリクエストです。');
            }

            $post = $this->request->getData();
            $phone = $post['phone'] ?? '';
            $email = $post['email'] ?? '';

            $resoponse = $this->_fetchDuplicateCustomers($phone, $email);

            if ($resoponse) {
                $data['duplicated'] = true;
                $data['data'] = $resoponse;
            }

            $data['error'] = false;
        } catch (\Exception $e) {
            $data['message'] = '重複チェックに失敗しました。'
                               . $e->getMessage();
        }
*/
        $this->autoRender = false;

        return new Response([
            'type' => 'json',
            'body' => json_encode($data)
        ]);


    }

}
