<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SendgridTemplatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SendgridTemplatesTable Test Case
 */
class SendgridTemplatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SendgridTemplatesTable
     */
    public $SendgridTemplates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sendgrid_templates',
        'app.versions',
        'app.templates',
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
        $config = TableRegistry::getTableLocator()->exists('SendgridTemplates') ? [] : ['className' => SendgridTemplatesTable::class];
        $this->SendgridTemplates = TableRegistry::getTableLocator()->get('SendgridTemplates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SendgridTemplates);

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
