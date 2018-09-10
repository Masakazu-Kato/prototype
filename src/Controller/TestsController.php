<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Core\Configure;

class TestsController extends AppController
{

    public function initialize()
    {
        // Json出力
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('SurveyMonkey');
        $this->loadComponent('Bitly');
    }


    public function office365() {
        

    }

    public function index()
    {

        $data = [];

        // $api_id = Configure::read("Api.surveymonkey.api_id");

        /**
         * api_id 取得
         */
        // $api = $this->SurveyMonkey->get('surveys') ?? '';


        /**
         * アンケート一覧生成
         * 任意のタイミングで本APIにアクセスしてDBへレコードセットする想定
         * NG timestamp がセットされていない
         */
        // $api = $this->SurveyMonkey->get('surveys/156042408/pages/') ?? '';

        /**
         * アンケート詳細
         * 任意のタイミングで本APIにアクセスしてDBへレコードをセットする想定
         * 更新日等をAPIで返答しないため更新のタイミング等は検討する
         */
        // $api = $this->SurveyMonkey->get('surveys/156042408/pages/38241806/questions/') ?? '';

        /**
         * アンケート設問詳細
         * 設問タイプによって分岐が必要
         * 全てのケースを洗い出す必要あり
         */
        // $api = $this->SurveyMonkey->get('surveys/156042408/pages/38241806/questions/122798888') ?? '';

        /**
         * アンケート詳細 (一括取得版)
         * データ更新反映はこちらで対応する
         */
        // $api = $this->SurveyMonkey->get('surveys/156042408/details') ?? '';

        /**
         * Bitly ShortURL
         */
        // $api = $this->Bitly->get('https://www.hoken-buffet.net/') ?? '';

        /**
         * 更新イベント用の処理
         */
        // $api = $this->SurveyMonkey->set() ?? '';

        /**
         * 回答関連
         */
        // $api = $this->SurveyMonkey->get('surveys/156042408/responses');

        // 回答結果
        // $api = $this->SurveyMonkey->get('surveys/156042408/responses/10157774172');
        // $api = $this->SurveyMonkey->get('surveys/156042408/responses/10157787215');

        // $api = $this->SurveyMonkey->get('collectors/215162909/responses');
        // 10157774172
        // 10157787215

        // 問題取得
        $api = $this->SurveyMonkey->set() ?? '';
        // 回答結果
        $api = $this->SurveyMonkey->setAnswer() ?? '';

        $data = $api;

        $this->viewBuilder()->className('Json');
        $this->set([
            'data' => $data,
            '_serialize' => ['data']
        ]);


    }

}
