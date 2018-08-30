<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnswerResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswerResultsTable Test Case
 */
class AnswerResultsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnswerResultsTable
     */
    public $AnswerResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.answer_results',
        'app.answers',
        'app.questions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AnswerResults') ? [] : ['className' => AnswerResultsTable::class];
        $this->AnswerResults = TableRegistry::getTableLocator()->get('AnswerResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnswerResults);

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
