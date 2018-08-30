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
 * SendGrid component
 */
class SendGridComponent extends Component
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
     * @param type $path
     * @return type
     * @throws \Exception
     */
    private function _fetch(string $path)
    {
        $this->loadModel('SendgridApiCounts');

        $url = Configure::read("Api.sendgrid.baseurl").$path;
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . Configure::read("Api.sendgrid.access_token"),
                'Content-Type'  => 'application/json'
            ]
        ]);
        $response = $client->get($url);
        $content = json_decode($response->getBody()->getContents(),true);
        $header = $response->getHeaders();
        $statusCode = $response->getStatusCode();

        $limit = $this->__limit($header);

        $sendgridApiCount = $this->SendgridApiCounts->newEntity();
        $sendgridApiCount->setApiValues($limit);
        $this->SendgridApiCounts->save($sendgridApiCount);

        $this->Log->api($statusCode);
        $this->Log->api($content);
        $this->Log->api($limit);

        switch($statusCode) {
            case 200:
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
            'date'      => date('Y-m-d'),
            'rate_limit'     => $array['X-Ratelimit-Limit'][0] ?? '',
            'rate_remaining' => $array['X-Ratelimit-Remaining'][0] ?? '',
            'rete_reset'     => $array['X-Ratelimit-Reset'][0] ?? ''
        ];
    }

    /**
     *
     * @param array $array
     * @return type
     */
    public function formatApiCounts(array $array)
    {
        return [
            'name'         => $array['name'],
            'generation'   => $array['generation'],
            'version_id'   => $array['versions'][0]['id'],
            'template_id'  => $array['versions'][0]['template_id'],
            'active'       => $array['versions'][0]['active'],
            'version_name' => $array['versions'][0]['name'],
            'subject'      => $array['versions'][0]['subject'],
            'editor'       => $array['versions'][0]['editor'],
            'updated_at'   => $array['versions'][0]['updated_at'],
            'origin_id'    => $array['id'],
            'created'      => date('Y-m-d H:i:s'),
            'modified'     => date('Y-m-d H:i:s')
         ];
    }

}
