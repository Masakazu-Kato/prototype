<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * WebExams Model
 */
class WebExamsTable extends Table
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

        $this->setTable('web_exams');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Exams', [
            'foreignKey' => 'exam_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('name');

        $validator
            ->integer('minutes')
            ->requirePresence('minutes', 'create')
            ->notEmpty('minutes');

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
        // $rules->add($rules->existsIn(['exam_id'], 'Exams'));
        // $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
