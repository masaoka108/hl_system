<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MRecordTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MRecordTypesTable Test Case
 */
class MRecordTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MRecordTypesTable
     */
    public $MRecordTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('MRecordTypes') ? [] : ['className' => 'App\Model\Table\MRecordTypesTable'];
        $this->MRecordTypes = TableRegistry::get('MRecordTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MRecordTypes);

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
