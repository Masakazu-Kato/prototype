<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * InCircle component
 */
class InCircleComponent extends Component
{

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
     * @param type $path
     * @return type
     * @throws \Exception
     */
    private function _fetch(string $path)
    {
        $url = Configure::read("Api.incircle.baseurl").$path;
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . Configure::read("Api.incircle.access_token"),
                'Content-Type'  => 'application/json'
            ]
        ]);
        $response = $client->get($url);
        $content = json_decode($response->getBody()->getContents(),true);
        $header = $response->getHeaders();
        $statusCode = $response->getStatusCode();
        $limit = $this->__limit($header);

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

}
