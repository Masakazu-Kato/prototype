<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

use Cake\Core\Configure;
use Cake\Http\Client;
use Cake\Http\Response;

use Cake\Datasource\ConnectionManager;
use Cake\Datasource\ModelAwareTrait;

/**
 * SurveyMonkey component
 */
class SurveyMonkeyComponent extends Component
{

    use ModelAwareTrait;

    public $components = ['Log'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * データを取得する
     *
     * @return \Cake\Http\Response
     */
    public function get(string $path)
    {
        return $this->_fetch($path);
    }

    /**
     *
     * @return type
     */
    public function setSurveys()
    {

        $this->loadModel('Surveys');
        $response = $this->_fetch('surveys?per_page='.Configure::read("Api.surveymonkey.get.per_page")) ?? '';
        $surveys = $response['data'] ?? '';

        $connection = ConnectionManager::get('default');

        try {
            $connection->begin();

            foreach($surveys as $value) {
                // もっと綺麗に書けるはず・・・
                $data = $this->Surveys->find('all', ['conditions' => ['Surveys.origin_id' => $value['id']]])->first();
                if($data) {
                    $survey = $this->Surveys->patchEntity($data, $value);
                    $survey->setApiValues($value);
                    $this->Surveys->save($survey);
                } else {
                    $survey = $this->Surveys->newEntity();
                    $survey->setApiValues($value);
                    $this->Surveys->save($survey);
                }
            }
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
            $this->Log->api($e);
        }

        return $response;

    }

    public function setSurveyDetails() {
        $this->loadModel('Surveys');
        $this->loadModel('SurveyPages');
        $this->loadModel('SurveyQuestions');
        $this->loadModel('SurveyAnswers');

        $this->Surveys->setDisplayField('origin_id');
        $data = $this->Surveys->find('list')->toArray();


        return $response;

    }

    // この処理で質問データ更新を行う
    public function set() {

        $this->loadModel('Surveys');
        $this->loadModel('SurveyPages');
        $this->loadModel('SurveyQuestions');
        $this->loadModel('SurveyAnswers');

        $response = $this->_fetch('surveys/156042408/details') ?? '';
        $surveyPages = $response['pages'] ?? '';

        $connection = ConnectionManager::get('default');

        try {
            $connection->begin();

            $survey = $this->Surveys->newEntity();
            $survey->setApiValues($response);
            $this->Surveys->save($survey);
            $connection->commit();

            foreach($surveyPages as $page) {
                $surveyPage = $this->SurveyPages->newEntity();
                $page['survey_id'] = $survey->id;
                $surveyPage->setApiValues($page);
                $this->SurveyPages->save($surveyPage);
                $connection->commit();
                if($page['questions']){
                    foreach($page['questions'] as $question) {
                        $surveyQuestion = $this->SurveyQuestions->newEntity();
                        $question['survey_page_id'] = $surveyPage->id;
                        $question['headings'] = $question['headings'][0]['heading'];
                        $surveyQuestion->setApiValues($question);
                        $this->SurveyQuestions->save($surveyQuestion);
                        $connection->commit();
                        if(isset($question['answers'])) {
                            foreach($question['answers'] as $key => $answer) {
                                $surveyAnswer = $this->SurveyAnswers->newEntity();
                                $answer[0]['survey_question_id'] = $surveyQuestion->id;
                                $answer[0]['choices'] = $key;
                                $answer[0]['score'] = $answer[0]['quiz_options']['score'] ?? 0;
                                $surveyAnswer->setApiValues($answer[0]);
                                $this->SurveyAnswers->save($surveyAnswer);
                                $connection->commit();
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            $connection->rollback();
            $this->Log->api($e);
        }

        return $response;
    }

    // この処理で回答データ更新を行う
    public function setAnswer() {

        $this->loadModel('Answers');
        $this->loadModel('AnswerPages');
        $this->loadModel('AnswerResults');

        $response = $this->_fetch('collectors/215162909/responses/bulk') ?? '';
        $answers = $response['data'] ?? '';

        $connection = ConnectionManager::get('default');
        try {
            $connection->begin();

            foreach($answers as $key => $value) {
                $answer = $this->Answers->newEntity();
                $answer->setApiValues($value);
                $this->Answers->save($answer);
                $connection->commit();
                if($value['pages']){
                    foreach($value['pages'] as $page) {
                        $answerPage = $this->AnswerPages->newEntity();
                        $page['answer_id'] = $answer->id;
                        $answerPage->setApiValues($page);
                        $this->AnswerPages->save($answerPage);
                        $connection->commit();
                        if($page['questions']) {
                            // ここでなぜかセットされないバグあり
                            foreach($page['questions'] as $key => $answer) {
                                $answerResult = $this->AnswerResults->newEntity();
                                $type = array_keys($answer['answers'][0]);
                                $value = array_values($answer['answers'][0]);
                                $answer['type'] = $type[0];
                                $answer['value'] = $value[0];
                                $answerResult->setApiValues($answer);
                                $this->AnswerResults->save($answerResult);
                                $connection->commit();
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            $connection->rollback();
            $this->Log->api($e);
        }

        return $answers;
    }

    /**
     *
     * @param type $path
     * @return type
     * @throws \Exception
     */
    private function _fetch(string $path)
    {
        $this->loadModel('SurveyMonkeyApiCounts');

        $url = Configure::read("Api.surveymonkey.baseurl").$path;
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . Configure::read("Api.surveymonkey.access_token"),
                'Content-Type'  => 'application/json'
            ]
        ]);
        $response = $client->get($url);
        $content = json_decode($response->getBody()->getContents(),true);
        $header = $response->getHeaders();
        $statusCode = $response->getStatusCode();
        $limit = $this->__limit($header);

        $surveyMonkeyApiCount = $this->SurveyMonkeyApiCounts->newEntity();
        $surveyMonkeyApiCount->setApiValues($limit);
        $this->SurveyMonkeyApiCounts->save($surveyMonkeyApiCount);

        $this->Log->api($statusCode);
        $this->Log->api($content);
        $this->Log->api($limit);

        switch($statusCode) {
            case 200:
                break;
            case 404:
                throw new \Exception('ページが見つかりません');
                break;
            case 413:
                throw new \Exception('リクエスト・レスポンス上限に達しました');
                break;
            default:
                throw new \Exception('データの取得に失敗しました');
                break;
        }
        return $content;
    }

    /**
     *
     * @param array $array
     * @return type
     */
    protected function __limit(array $array)
    {
        return [
            'date'                    => date('Y-m-d'),
            'global_minute_limit'     => $array['X-Ratelimit-App-Global-Minute-Limit'][0] ?? '',
            'global_minute_remaining' => $array['X-Ratelimit-App-Global-Minute-Remaining'][0] ?? '',
            'global_minute_reset'     => $array['X-Ratelimit-App-Global-Minute-Reset'][0] ?? '',
            'global_day_limit'        => $array['X-Ratelimit-App-Global-Day-Limit'][0] ?? '',
            'global_day_remaining'    => $array['X-Ratelimit-App-Global-Day-Remaining'][0] ?? '',
            'global_day_reset'        => $array['X-Ratelimit-App-Global-Day-Reset'][0] ?? ''
        ];
    }

}
