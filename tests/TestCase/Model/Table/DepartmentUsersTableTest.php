<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentUsersTable Test Case
 */
class DepartmentUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentUsersTable
     */
    public $DepartmentUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.department_users',
        'app.departments',
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
        $config = TableRegistry::getTableLocator()->exists('DepartmentUsers') ? [] : ['className' => DepartmentUsersTable::class];
        $this->DepartmentUsers = TableRegistry::getTableLocator()->get('DepartmentUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DepartmentUsers);

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
