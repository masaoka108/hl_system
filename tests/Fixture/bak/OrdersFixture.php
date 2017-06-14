<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 *
 */
class OrdersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'order_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'm_customers_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name_sei' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'name_mei' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_address' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'zip_code' => ['type' => 'string', 'length' => 9, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'address' => ['type' => 'string', 'length' => 500, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tel' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'delivery_fee' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'order_amount' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'profit' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'desired_delivery_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'estimated_delivery_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'delivery_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'works_on' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'entry' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ins_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ins_person' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'edt_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'edit_person' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id' => ['type' => 'index', 'columns' => ['id'], 'length' => []],
            'm_customers_id' => ['type' => 'index', 'columns' => ['m_customers_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'orders_ibfk_2' => ['type' => 'foreign', 'columns' => ['m_customers_id'], 'references' => ['m_customers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 104,
            'order_date' => '2016-11-01 00:00:00',
            'm_customers_id' => 1,
            'name_sei' => '岡村',
            'name_mei' => '匡洋',
            'mail_address' => 'oka@aaa.com',
            'zip_code' => '180-0014',
            'address' => '東京都東京市東京町1-1-1 東京ビルディング306',
            'tel' => '09077777777',
            'note' => '',
            'delivery_fee' => 1500,
            'order_amount' => 15700,
            'profit' => 8000,
            'desired_delivery_date' => '2016-11-01 00:00:00',
            'estimated_delivery_date' => '2016-11-01 00:00:00',
            'delivery_date' => '2016-11-01 00:00:00',
            'works_on' => 1,
            'entry' => null,
            'ins_date' => null,
            'ins_person' => null,
            'edt_date' => null,
            'edit_person' => null
        ],
        [
            'id' => 105,
            'order_date' => '2016-06-01 00:00:00',
            'm_customers_id' => null,
            'name_sei' => '西川',
            'name_mei' => '康人',
            'mail_address' => 'nishi@aaa.com',
            'zip_code' => '160-999',
            'address' => '大阪府大阪市大阪町1-1-1 大阪ビルディング306',
            'tel' => '09088888888',
            'note' => '',
            'delivery_fee' => 1500,
            'order_amount' => 37600,
            'profit' => 25000,
            'desired_delivery_date' => null,
            'estimated_delivery_date' => null,
            'delivery_date' => null,
            'works_on' => 1,
            'entry' => null,
            'ins_date' => null,
            'ins_person' => null,
            'edt_date' => null,
            'edit_person' => null
        ],
        [
            'id' => 107,
            'order_date' => '2016-02-02 00:00:00',
            'm_customers_id' => 3,
            'name_sei' => '安岡',
            'name_mei' => '太郎',
            'mail_address' => 'yasu@aaaaaa.com',
            'zip_code' => '147-9874',
            'address' => '大阪府大阪市大阪1-1-1',
            'tel' => '090-9999-9999',
            'note' => '',
            'delivery_fee' => 1500,
            'order_amount' => 89000,
            'profit' => 70000,
            'desired_delivery_date' => null,
            'estimated_delivery_date' => null,
            'delivery_date' => '2016-02-20 00:00:00',
            'works_on' => 1,
            'entry' => null,
            'ins_date' => null,
            'ins_person' => null,
            'edt_date' => null,
            'edit_person' => null
        ],
    ];
}
