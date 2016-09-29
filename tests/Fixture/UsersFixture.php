<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;
use Cake\Auth\DefaultPasswordHasher;


/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{


    // オプション。異なるテストデータソースにフィクスチャをロードするために、このプロパティを設定
    public $connection = 'test';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
/*
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'del_flg' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ins_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ins_person' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'edt_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'edt_person' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
*/
    // @codingStandardsIgnoreEnd

	public $import = ['table' => 'Users'];


    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'username' => 'admin2',
            'password' => 'admin2',
            'del_flg' => 0,
            'ins_date' => '2016-08-23 05:38:50',
            'edt_date' => '2016-08-23 05:38:50'
        ],
    ];
    


	//ins_date などに関数を使ってデータをセットしたい時
    public function init()
    {
        $this->records = [
            [
	            'username' => 'admin3',
	            'password' => (new DefaultPasswordHasher)->hash('admin3'),
	            'del_flg' => 0,
	            'ins_date' => date('Y-m-d H:i:s'),
	            'edt_date' => date('Y-m-d H:i:s')
            ],
        ];
        parent::init();
    }
    
    
    
}
