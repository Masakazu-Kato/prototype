<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveyCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveyCategoriesTable Test Case
 */
class SurveyCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveyCategoriesTable
     */
    public $SurveyCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.survey_categories',
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
        $config = TableRegistry::getTableLocator()->exists('SurveyCategories') ? [] : ['className' => SurveyCategoriesTable::class];
        $this->SurveyCategories = TableRegistry::getTableLocator()->get('SurveyCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SurveyCategories);

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
