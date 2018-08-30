<?php
namespace App\Shell;

use Cake\Console\Shell;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;


use App\Controller\Component\BitlyComponent;
use App\Controller\Component\LogComponent;
use App\Controller\Component\SendGridComponent;
use App\Controller\Component\SurveyMonkeyComponent;


/**
 * Test shell command.
 */
class TestShell extends Shell
{

    public function initialize() {

        $this->Bitly = new BitlyComponent(new ComponentRegistry());
        $this->Log = new LogComponent(new ComponentRegistry());
        $this->SendGrid = new SendGridComponent(new ComponentRegistry());
        $this->SurveyMonkey = new SurveyMonkeyComponent(new ComponentRegistry());

    }

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        // アカウント情報取得
        // $response = $this->SurveyMonkey->get('users/me');

        // カテゴリ情報取得
        // $response = $this->SurveyMonkey->get('survey_categories');

        // カテゴリ情報取得 651 件
        // $response = $this->SurveyMonkey->get('survey_languages?per_page=1000');

        // 不明
        // $response = $this->SurveyMonkey->get('survey_folders?per_page=1000');

        // $response = $this->SurveyMonkey->get('errors');

        // Surveys リスト取得
        // $response = $this->SurveyMonkey->setSurveys();

        // $response = $this->SurveyMonkey->setSurveyDetails();

        // $response = $this->SendGrid->get('templates');


        $response = $this->Bitly->get('https://www.yahoo.co.jp/');
        $this->Log->shell($response);
    }
}
