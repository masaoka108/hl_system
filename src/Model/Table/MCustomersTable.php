<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MCustomers Model
 *
 * @method \App\Model\Entity\MCustomer get($primaryKey, $options = [])
 * @method \App\Model\Entity\MCustomer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MCustomer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MCustomer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MCustomer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MCustomer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MCustomer findOrCreate($search, callable $callback = null)
 */
class MCustomersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('m_customers');
        //$this->displayField('id');
        $this->displayField('name_sei'.'name_mei');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name_sei');

        $validator
            ->allowEmpty('name_mei');

        $validator
            ->allowEmpty('mail_address');

        $validator
            ->allowEmpty('zip_code');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('tel');

        $validator
            ->integer('del_flg')
            ->allowEmpty('del_flg');

        $validator
            ->dateTime('ins_date')
            ->allowEmpty('ins_date');

        $validator
            ->integer('ins_person')
            ->allowEmpty('ins_person');

        $validator
            ->dateTime('edt_date')
            ->allowEmpty('edt_date');

        $validator
            ->integer('edt_person')
            ->allowEmpty('edt_person');

        return $validator;
    }
}
