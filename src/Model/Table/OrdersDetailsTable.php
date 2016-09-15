<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdersDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Orders
 * @property \Cake\ORM\Association\BelongsTo $MRecordTypes
 *
 * @method \App\Model\Entity\OrdersDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdersDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrdersDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdersDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdersDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersDetail findOrCreate($search, callable $callback = null)
 */
class OrdersDetailsTable extends Table
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

        $this->table('orders_details');
        $this->displayField('title');
        $this->primaryKey('id');


        $this->belongsTo('Orders', [
            'foreignKey' => 'orders_id',
            'joinType' => 'INNER'
        ]);


        $this->belongsTo('MRecordTypes', [
            'foreignKey' => 'm_record_types_id'
        ]);
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
            ->integer('qty')
            ->allowEmpty('qty');

        $validator
            ->integer('rpm')
            ->allowEmpty('rpm');

        $validator
            ->allowEmpty('artist_name');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('track_list');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['orders_id'], 'Orders'));
        $rules->add($rules->existsIn(['m_record_types_id'], 'MRecordTypes'));

        return $rules;
    }
}
