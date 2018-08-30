<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveyAnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveyAnswersTable Test Case
 */
class SurveyAnswersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveyAnswersTable
     */
    public $SurveyAnswers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.survey_answers',
        'app.survey_questions',
        'app.origin_answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SurveyAnswers') ? [] : ['className' => SurveyAnswersTable::class];
        $this->SurveyAnswers = TableRegistry::getTableLocator()->get('SurveyAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SurveyAnswers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
