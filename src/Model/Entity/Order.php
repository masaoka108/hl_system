<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $order_date
 * @property int $users_id
 * @property string $name_sei
 * @property string $name_mei
 * @property string $mail_address
 * @property string $zip_code
 * @property string $address
 * @property string $tel
 * @property string $note
 * @property int $delivery_fee
 * @property int $order_amount
 * @property int $profit
 * @property \Cake\I18n\Time $desired_delivery_date
 * @property \Cake\I18n\Time $estimated_delivery_date
 * @property \Cake\I18n\Time $delivery_date
 * @property int $works_on
 * @property int $entry
 * @property \Cake\I18n\Time $ins_date
 * @property int $ins_person
 * @property \Cake\I18n\Time $edt_date
 * @property int $edit_person
 *
 * @property \App\Model\Entity\User $user
 */
class Order extends Entity
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
