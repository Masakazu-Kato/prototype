<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\MicroSoftComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\MicroSoftComponent Test Case
 */
class MicroSoftComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\MicroSoftComponent
     */
    public $MicroSoft;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->MicroSoft = new MicroSoftComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MicroSoft);

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
