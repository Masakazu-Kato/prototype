<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MailTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MailTypesTable Test Case
 */
class MailTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MailTypesTable
     */
    public $MailTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mail_types',
        'app.mails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MailTypes') ? [] : ['className' => MailTypesTable::class];
        $this->MailTypes = TableRegistry::getTableLocator()->get('MailTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MailTypes);

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
