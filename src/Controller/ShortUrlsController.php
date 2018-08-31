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
            'contain' => ['Students', 'Surveys'],
            'limit' => 50
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

}
