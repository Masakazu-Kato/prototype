<?php
use Cake\Core\Configure;

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 */

return [
    'System' => [
        'name' => ''
    ],
    'Api' => [
        'surveymonkey' => [
            'baseurl'       => '',
            'client_id'     => '',
            'secret'        => '',
            'api_id'        => '',
            'access_token'  => '',
            'get'           => [
                'per_page'  => ''
            ],
        ],
        'sendgrid' => [
            'baseurl'       => '',
            'api_key'       => '',
            'access_token'  => '',
        ],
        'incircle' => [
            'baseurl'       => '',
            'access_token'  => '',
            'locale'        => '',
        ],
        'bitly' => [
            'baseurl'       => '',
            'access_token'  => '',
        ],
        'office365' => [
            'authorize_url'    => '',
            'access_token_url' => '',
            'graph_me_url'     => '',
            'grant_type'       => '',
            'redirect_url'     => '',
            'client_id'        => '',
            'client_secret'    => '',
            'scope'            => '',
            'state'            => ''
        ],

    ]
];