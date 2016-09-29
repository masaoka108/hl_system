<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersDetailsTable Test Case
 */
class OrdersDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersDetailsTable
     */
    public $OrdersDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.orders_details',
        'app.orders',
//        'app.m_users',
        'app.m_record_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrdersDetails') ? [] : ['className' => 'App\Model\Table\OrdersDetailsTable'];
        $this->OrdersDetails = TableRegistry::get('OrdersDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrdersDetails);

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
