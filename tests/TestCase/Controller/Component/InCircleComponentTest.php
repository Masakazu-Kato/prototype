<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\InCircleComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\InCircleComponent Test Case
 */
class InCircleComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\InCircleComponent
     */
    public $InCircle;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->InCircle = new InCircleComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InCircle);

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
