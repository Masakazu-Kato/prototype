<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SurveyMonkeyApiCounts Controller
 *
 * @property \App\Model\Table\SurveyMonkeyApiCountsTable $SurveyMonkeyApiCounts
 *
 * @method \App\Model\Entity\SurveyMonkeyApiCount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SurveyMonkeyApiCountsController extends AppController
{

    public $paginate = [
        'limit' => 50,
        'order' => [
            'SurveyMonkeyApiCounts.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $surveyMonkeyApiCounts = $this->paginate($this->SurveyMonkeyApiCounts);

        $this->set(compact('surveyMonkeyApiCounts'));
        $this->set('sidebarName', 'Settings/sidebar');
    }

}
