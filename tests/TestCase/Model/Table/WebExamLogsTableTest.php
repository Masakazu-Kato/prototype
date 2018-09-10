<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebExamLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebExamLogsTable Test Case
 */
class WebExamLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WebExamLogsTable
     */
    public $WebExamLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.web_exam_logs',
        'app.exams',
        'app.students',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WebExamLogs') ? [] : ['className' => WebExamLogsTable::class];
        $this->WebExamLogs = TableRegistry::getTableLocator()->get('WebExamLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WebExamLogs);

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
