<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationErrorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationErrorsTable Test Case
 */
class ApplicationErrorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationErrorsTable
     */
    public $ApplicationErrors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.application_errors',
        'app.applications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ApplicationErrors') ? [] : ['className' => ApplicationErrorsTable::class];
        $this->ApplicationErrors = TableRegistry::getTableLocator()->get('ApplicationErrors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationErrors);

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
