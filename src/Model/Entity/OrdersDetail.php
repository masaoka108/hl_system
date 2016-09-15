<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdersDetail Entity
 *
 * @property int $id
 * @property int $orders_id
 * @property int $m_record_types_id
 * @property int $qty
 * @property int $rpm
 * @property string $artist_name
 * @property string $title
 * @property string $track_list
 * @property \Cake\I18n\Time $ins_date
 * @property int $ins_person
 * @property \Cake\I18n\Time $edt_date
 * @property int $edt_person
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\MRecordType $m_record_type
 */
class OrdersDetail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
