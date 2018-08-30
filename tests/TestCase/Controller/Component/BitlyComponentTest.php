<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\BitlyComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\BitlyComponent Test Case
 */
class BitlyComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\BitlyComponent
     */
    public $Bitly;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Bitly = new BitlyComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bitly);

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
