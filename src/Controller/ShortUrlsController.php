<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShortUrls Controller
 *
 * @property \App\Model\Table\ShortUrlsTable $ShortUrls
 *
 * @method \App\Model\Entity\ShortUrl[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShortUrlsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Surveys']
        ];
        $shortUrls = $this->paginate($this->ShortUrls);

        $this->set(compact('shortUrls'));
    }

    /**
     * View method
     *
     * @param string|null $id Short Url id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shortUrl = $this->ShortUrls->get($id, [
            'contain' => ['Students', 'Surveys']
        ]);

        $this->set('shortUrl', $shortUrl);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shortUrl = $this->ShortUrls->newEntity();
        if ($this->request->is('post')) {
            $shortUrl = $this->ShortUrls->patchEntity($shortUrl, $this->request->getData());
            if ($this->ShortUrls->save($shortUrl)) {
                $this->Flash->success(__('The short url has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short url could not be saved. Please, try again.'));
        }
        $students = $this->ShortUrls->Students->find('list', ['limit' => 200]);
        $surveys = $this->ShortUrls->Surveys->find('list', ['limit' => 200]);
        $this->set(compact('shortUrl', 'students', 'surveys'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Short Url id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shortUrl = $this->ShortUrls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shortUrl = $this->ShortUrls->patchEntity($shortUrl, $this->request->getData());
            if ($this->ShortUrls->save($shortUrl)) {
                $this->Flash->success(__('短縮URL情報を更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short url could not be saved. Please, try again.'));
        }
        $students = $this->ShortUrls->Students->find('list', ['limit' => 200]);
        $surveys = $this->ShortUrls->Surveys->find('list', ['limit' => 200]);
        $this->set(compact('shortUrl', 'students', 'surveys'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Short Url id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shortUrl = $this->ShortUrls->get($id);
        if ($this->ShortUrls->delete($shortUrl)) {
            $this->Flash->success(__('The short url has been deleted.'));
        } else {
            $this->Flash->error(__('The short url could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
