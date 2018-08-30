<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SendgridApiCountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SendgridApiCountsTable Test Case
 */
class SendgridApiCountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SendgridApiCountsTable
     */
    public $SendgridApiCounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sendgrid_api_counts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SendgridApiCounts') ? [] : ['className' => SendgridApiCountsTable::class];
        $this->SendgridApiCounts = TableRegistry::getTableLocator()->get('SendgridApiCounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SendgridApiCounts);

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
