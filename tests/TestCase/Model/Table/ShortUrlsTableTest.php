<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShortUrlsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShortUrlsTable Test Case
 */
class ShortUrlsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShortUrlsTable
     */
    public $ShortUrls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.short_urls',
        'app.students',
        'app.surveys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShortUrls') ? [] : ['className' => ShortUrlsTable::class];
        $this->ShortUrls = TableRegistry::getTableLocator()->get('ShortUrls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShortUrls);

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
