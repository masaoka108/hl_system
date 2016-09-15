<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MCustomer Entity
 *
 * @property int $id
 * @property string $name_sei
 * @property string $name_mei
 * @property string $mail_address
 * @property string $zip_code
 * @property string $address
 * @property string $tel
 * @property int $del_flg
 * @property \Cake\I18n\Time $ins_date
 * @property int $ins_person
 * @property \Cake\I18n\Time $edt_date
 * @property int $edt_person
 */
class MCustomer extends Entity
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

    protected function _getFullName()
    {
        return $this->_properties['name_sei'] . '  ' .$this->_properties['name_mei'];
    }



}
