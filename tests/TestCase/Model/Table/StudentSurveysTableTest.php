<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentSurveysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentSurveysTable Test Case
 */
class StudentSurveysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentSurveysTable
     */
    public $StudentSurveys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.student_surveys',
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
        $config = TableRegistry::getTableLocator()->exists('StudentSurveys') ? [] : ['className' => StudentSurveysTable::class];
        $this->StudentSurveys = TableRegistry::getTableLocator()->get('StudentSurveys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentSurveys);

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
