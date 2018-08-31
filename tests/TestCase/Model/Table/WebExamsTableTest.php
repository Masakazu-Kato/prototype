<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebExamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebExamsTable Test Case
 */
class WebExamsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WebExamsTable
     */
    public $WebExams;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.web_exams',
        'app.exams',
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
        $config = TableRegistry::getTableLocator()->exists('WebExams') ? [] : ['className' => WebExamsTable::class];
        $this->WebExams = TableRegistry::getTableLocator()->get('WebExams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WebExams);

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
