<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MRecordTypes Model
 *
 * @method \App\Model\Entity\MRecordType get($primaryKey, $options = [])
 * @method \App\Model\Entity\MRecordType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MRecordType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MRecordType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MRecordType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MRecordType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MRecordType findOrCreate($search, callable $callback = null)
 */
class MRecordTypesTable extends Table
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

        $this->table('m_record_types');
        $this->displayField('id');
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
            ->allowEmpty('record_type_name');

        return $validator;
    }
}
