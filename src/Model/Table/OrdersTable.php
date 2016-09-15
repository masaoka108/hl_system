<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Orders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null)
 */
class OrdersTable extends Table
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

        // Add the behaviour to your table
        $this->addBehavior('Search.Search');

        // Setup search filter using search manager
        $this->searchManager()
            ->value('author_id')
            // Here we will alias the 'q' query param to search the `Articles.title`
            // field and the `Articles.content` field, using a LIKE match, with `%`
            // both before and after.

            //オーダー日（From）
            ->add('srhOrderDateFrom', 'Search.Compare', [
                'operator' => '>=',
                'field' => ['order_date']
            ])
            ->add('srhOrderDateTo', 'Search.Compare', [
                'operator' => '<=',
                'field' => ['order_date']
            ])

            //カスタマー氏名
            ->add('customer_name', 'Search.Like', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['name_sei','name_mei']
            ])

            //WORKS掲載
            ->add('works_on', 'Search.Value')

            //備考
            ->add('note', 'Search.Like', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => ['note']
            ])


            ->add('foo', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    // Modify $query as required
                }
            ]);



        $this->table('orders');
        $this->displayField('id');
        $this->primaryKey('id');

/*
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id'
        ]);
*/


        $this->belongsTo('m_customers', [
            'foreignKey' => 'm_customers_id'
        ]);


        //$this->hasMany('orders_details');

/*
        $this->hasMany('orders_details', [     // containで指定する名前
            'className' => 'orders_details',            // リレーション先のTable
            'foreignKey' => 'orders_id', // FK
            'conditions' => array('orders_details.orders_id' => 'orders.id'),
            //'propertyName' => 'created_user',  // オブジェクトを入れるキー名
        ]);
*/

/*
        $this->hasMany('orders_details', [
            'foreignKey' => 'id'
        ]);
*/

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
            ->date('order_date')
            ->requirePresence('order_date', 'create')
            ->notEmpty('order_date','※必須項目');

        $validator
            ->notEmpty('name_sei', '※必須項目')
            //->allowEmpty('name_sei');
            ->add('name_sei', [
                   'length' => [
                     'rule' => ['maxLength', 30],
                     'message' => '30文字以内で記入してください。',
                   ]
                 ]);

        $validator
            ->allowEmpty('name_mei');

        $validator
            ->allowEmpty('mail_address')
            ->add('mail_address', 'validFormat', [
                   'rule' => 'email',
                   'message' => 'メールアドレスを入力して下さい。'
               ]);

        $validator
            ->allowEmpty('zip_code');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('tel');

        $validator
            ->allowEmpty('note');
/*
            ->add('note', [
                   'length' => [
                     'rule' => ['minLength', 10],
                     'message' => '10文字以上で記入してください。',
                   ]
                 ]);
*/

        $validator
            ->integer('delivery_fee')
            ->allowEmpty('delivery_fee');

        $validator
            ->integer('order_amount')
            ->allowEmpty('order_amount');

        $validator
            ->integer('profit')
            ->allowEmpty('profit');

        $validator
            ->date('desired_delivery_date')
            ->allowEmpty('desired_delivery_date');

        $validator
            ->date('estimated_delivery_date')
            ->allowEmpty('estimated_delivery_date');

        $validator
            ->date('delivery_date')
            ->allowEmpty('delivery_date');

        $validator
            ->integer('works_on')
            ->allowEmpty('works_on');

        $validator
            ->integer('entry')
            ->allowEmpty('entry');

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
            ->integer('edit_person')
            ->allowEmpty('edit_person');

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
        //$rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['m_customers_id'], 'm_customers'));


        return $rules;
    }
}
