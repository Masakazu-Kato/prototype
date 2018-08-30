<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveyErrorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveyErrorsTable Test Case
 */
class SurveyErrorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveyErrorsTable
     */
    public $SurveyErrors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.survey_errors',
        'app.origins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SurveyErrors') ? [] : ['className' => SurveyErrorsTable::class];
        $this->SurveyErrors = TableRegistry::getTableLocator()->get('SurveyErrors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SurveyErrors);

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
