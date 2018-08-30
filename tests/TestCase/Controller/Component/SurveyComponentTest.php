<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SurveyComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SurveyComponent Test Case
 */
class SurveyComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\SurveyComponent
     */
    public $Survey;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Survey = new SurveyComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Survey);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
