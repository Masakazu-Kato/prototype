<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SendGridComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SendGridComponent Test Case
 */
class SendGridComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\SendGridComponent
     */
    public $SendGrid;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->SendGrid = new SendGridComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SendGrid);

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
