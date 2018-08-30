<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * ShortMessages Model
 */
class ShortMessagesTable extends Table
{

    protected static $_translationTable = [
        'id'         => 'ID',
        'user_id'    => 'ユーザーID',
        'student_id' => '受講者ID',
        'body'       => '本文',
        'raw'        => '',
        'status'     => 'ステータス',
        'created'    => '作成日',
        'modified'   => '更新日',

        'user'       => 'ユーザー',
        'student'    => '受講者'

    ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('short_messages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            // 'joinType' => 'INNER'
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            // 'joinType' => 'INNER'
            'joinType' => 'LEFT'
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
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->scalar('raw')
            ->requirePresence('raw', 'create')
            ->notEmpty('raw');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['student_id'], 'Students'));

        return $rules;
    }
}
