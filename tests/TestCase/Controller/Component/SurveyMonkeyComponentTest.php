<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SurveyMonkeyComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SurveyMonkeyComponent Test Case
 */
class SurveyMonkeyComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\SurveyMonkeyComponent
     */
    public $SurveyMonkey;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->SurveyMonkey = new SurveyMonkeyComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SurveyMonkey);

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
