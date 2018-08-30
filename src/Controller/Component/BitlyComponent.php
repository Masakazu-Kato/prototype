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
 * Bitly component
 */
class BitlyComponent extends Component
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
    public function get(string $url)
    {
        return $this->_fetch($url);
    }

    /**
     *
     * @param type $path
     * @return type
     * @throws \Exception
     */
    private function _fetch(string $url)
    {

        $this->loadModel('ShortUrls');

        $url = Configure::read("Api.bitly.baseurl").'?access_token='.
                Configure::read("Api.bitly.access_token").'&longUrl='.$url;
        $client = new Client();
        $response = $client->get($url);
        $content = json_decode($response->getBody()->getContents(),true);
        $statusCode = $response->getStatusCode();

        // ヘッダー情報でリクエスト上限が設定されていない
        $this->Log->api($statusCode);
        $this->Log->api($content);

        switch($statusCode) {
            case 200:
                $connection = ConnectionManager::get('default');

                try {
                    $connection->begin();
                    $value = $this->__formatShortUrl($content);
                    $shortUrl = $this->ShortUrls->newEntity();
                    $shortUrl->setApiValues($value);
                    $this->ShortUrls->save($shortUrl);
                    $connection->commit();
                } catch (\Exception $e) {
                    $connection->rollback();
                    $this->Log->api($e);
                }
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
     * @param int $student_id
     * @param int $survey_id
     * @return type
     */
    protected function __formatShortUrl(array $array, int $student_id = 0, int $survey_id = 0)
    {
        return [
            'url'         => $array['data']['url'],
            'long_url'    => $array['data']['long_url'],
            'status_code' => $array['status_code'],
            'status_txt'  => $array['status_txt'],
            'hash'        => $array['data']['hash'],
            'global_hash' => $array['data']['global_hash'],
            'new_hash'    => $array['data']['new_hash'],
            'student_id'  => $student_id ?? 0,
            'survey_id'   => $survey_id ?? 0,
            'created'     => date('Y-m-d H:i:s'),
            'modified'    => date('Y-m-d H:i:s')
         ];
    }

}
