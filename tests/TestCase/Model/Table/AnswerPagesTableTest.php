<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnswerPagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswerPagesTable Test Case
 */
class AnswerPagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnswerPagesTable
     */
    public $AnswerPages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.answer_pages',
        'app.answers',
        'app.origins',
        'app.origin_answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AnswerPages') ? [] : ['className' => AnswerPagesTable::class];
        $this->AnswerPages = TableRegistry::getTableLocator()->get('AnswerPages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnswerPages);

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
