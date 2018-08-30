<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveyLanguagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveyLanguagesTable Test Case
 */
class SurveyLanguagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveyLanguagesTable
     */
    public $SurveyLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.survey_languages',
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
        $config = TableRegistry::getTableLocator()->exists('SurveyLanguages') ? [] : ['className' => SurveyLanguagesTable::class];
        $this->SurveyLanguages = TableRegistry::getTableLocator()->get('SurveyLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SurveyLanguages);

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
