<?php
namespace App\Shell;

use Cake\Console\Shell;

use Cake\ORM\TableRegistry;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

use App\Controller\Component\SendGridComponent;
use App\Controller\Component\SurveyMonkeyComponent;

/**
 * DefaultSet shell command.
 */
class DefaultSetShell extends Shell
{

    public function initialize() {
        $this->SendGrid = new SendGridComponent(new ComponentRegistry());
        $this->SurveyMonkey = new SurveyMonkeyComponent(new ComponentRegistry());

        $this->SurveyCategories = TableRegistry::get("SurveyCategories");
        $this->SurveyErrors = TableRegistry::get("SurveyErrors");
        $this->SurveyLanguages = TableRegistry::get("SurveyLanguages");
        $this->SendgridTemplates = TableRegistry::get("SendgridTemplates");
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
        // SurveyMonkey
        $response = $this->SurveyMonkey->get('survey_categories');
        foreach ($response['data'] as $value) {
            $surveyCategory = $this->SurveyCategories->newEntity();
            $surveyCategory->setApiValues($value);
            $this->SurveyCategories->save($surveyCategory);
        }

        $response = $this->SurveyMonkey->get('survey_languages?per_page=1000');
        foreach ($response['data'] as $value) {
            $surveyLanguage = $this->SurveyLanguages->newEntity();
            $surveyLanguage->setApiValues($value);
            $this->SurveyLanguages->save($surveyLanguage);
        }

        $response = $this->SurveyMonkey->get('errors');
        foreach ($response['data'] as $value) {
            $surveyError = $this->SurveyErrors->newEntity();
            $surveyError->setApiValues($value);
            $this->SurveyErrors->save($surveyError);
        }

        // SendGrid
        /*
        $response = $this->SendGrid->get('templates');
        foreach ($response['templates'] as $key => $value) {
            $val = $this->SendGrid->formatApiCounts($value);
            $sendgridTemplate = $this->SendgridTemplates->newEntity();
            $sendgridTemplate->setApiValues($val);
            $this->SendgridTemplates->save($sendgridTemplate);
        }
        */

    }
}
