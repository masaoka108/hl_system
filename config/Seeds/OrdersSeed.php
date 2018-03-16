<?php
use Migrations\AbstractSeed;

/**
 * Orders seed.
 */
class OrdersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '104',
                'order_date' => '2016-11-01',
                'm_customers_id' => '1',
                'name_sei' => '岡村',
                'name_mei' => '匡洋',
                'mail_address' => 'oka@aaa.com',
                'zip_code' => '180-0014',
                'address' => '東京都東京市東京町1-1-1 東京ビルディング306',
                'tel' => '09077777777',
                'note' => '',
                'delivery_fee' => '1500',
                'order_amount' => '15700',
                'profit' => '8000',
                'desired_delivery_date' => '2016-11-01',
                'estimated_delivery_date' => '2016-11-01',
                'delivery_date' => '2016-11-01',
                'works_on' => '1',
                'entry' => NULL,
                'ins_date' => NULL,
                'ins_person' => NULL,
                'edt_date' => NULL,
                'edit_person' => NULL,
            ],
            [
                'id' => '105',
                'order_date' => '2016-06-01',
                'm_customers_id' => NULL,
                'name_sei' => '西川',
                'name_mei' => '康人',
                'mail_address' => 'nishi@aaa.com',
                'zip_code' => '160-999',
                'address' => '大阪府大阪市大阪町1-1-1 大阪ビルディング306',
                'tel' => '09088888888',
                'note' => '',
                'delivery_fee' => '1500',
                'order_amount' => '37600',
                'profit' => '25000',
                'desired_delivery_date' => NULL,
                'estimated_delivery_date' => NULL,
                'delivery_date' => NULL,
                'works_on' => '1',
                'entry' => NULL,
                'ins_date' => NULL,
                'ins_person' => NULL,
                'edt_date' => NULL,
                'edit_person' => NULL,
            ],
            [
                'id' => '107',
                'order_date' => '2016-02-02',
                'm_customers_id' => '3',
                'name_sei' => '安岡',
                'name_mei' => '太郎',
                'mail_address' => 'yasu@aaaaaa.com',
                'zip_code' => '147-9874',
                'address' => '大阪府大阪市大阪1-1-1',
                'tel' => '090-9999-9999',
                'note' => '',
                'delivery_fee' => '1500',
                'order_amount' => '89000',
                'profit' => '70000',
                'desired_delivery_date' => NULL,
                'estimated_delivery_date' => NULL,
                'delivery_date' => '2016-02-20',
                'works_on' => '1',
                'entry' => NULL,
                'ins_date' => NULL,
                'ins_person' => NULL,
                'edt_date' => NULL,
                'edit_person' => NULL,
            ],
        ];

        $table = $this->table('orders');
        $table->insert($data)->save();
    }
}
