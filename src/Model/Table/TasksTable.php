<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * Tasks Model
 */
class TasksTable extends Table
{

    protected static $_translationTable = [
        'id'             => 'ID',
        'name'           => '名称',
        'text'           => '内容',
        'start'          => '開始',
        'end'            => '終了',
        'user_id'        => 'ユーザーID',
        'assign_id'      => 'アサインID',
        'student_id'     => '受講者ID',
        'assigned_id'    => '担当者ID',
        'task_status_id' => 'ステータスID',
        'created'        => '作成日',
        'modified'       => '更新日',

        'user'           => 'ユーザー',
        'assign'         => 'アサイン',
        'student'        => '受講者',
        'assigned'       => '担当者',
        'task_status'    => 'ステータス'

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

        $this->setTable('tasks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Assigns', [
            'className' => 'Users',
            'foreignKey' => 'assign_id',
            'joinType' => 'LEFT'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'LEFT'
        ]);

        $this->belongsTo('TaskStatuses', [
            'foreignKey' => 'task_status_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->dateTime('start')
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->dateTime('end')
            ->requirePresence('end', 'create')
            ->notEmpty('end');

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
        $rules->add($rules->existsIn(['assign_id'], 'Users'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['task_status_id'], 'TaskStatuses'));

        return $rules;
    }
}
