<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MUsersTable Test Case
 */
class MUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MUsersTable
     */
    public $MUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.m_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MUsers') ? [] : ['className' => 'App\Model\Table\MUsersTable'];
        $this->MUsers = TableRegistry::get('MUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MUsers);

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
}
