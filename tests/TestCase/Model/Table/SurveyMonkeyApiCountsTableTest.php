<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveyMonkeyApiCountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveyMonkeyApiCountsTable Test Case
 */
class SurveyMonkeyApiCountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveyMonkeyApiCountsTable
     */
    public $SurveyMonkeyApiCounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.survey_monkey_api_counts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SurveyMonkeyApiCounts') ? [] : ['className' => SurveyMonkeyApiCountsTable::class];
        $this->SurveyMonkeyApiCounts = TableRegistry::getTableLocator()->get('SurveyMonkeyApiCounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SurveyMonkeyApiCounts);

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
}
