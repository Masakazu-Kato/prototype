<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * SurveyAnswers Model
 */
class SurveyAnswersTable extends Table
{

    protected static $_translationTable = [
        'id'                 => 'ID',
        'survey_question_id' => '',
        'choices'            => '',
        'quiz_options'       => '',
        'score'              => '',
        'visible'            => '',
        'text'               => '',
        'position'           => '',
        'weight'             => '',
        'is_na'              => '',
        'origin_id'          => '',
        'created'            => '作成日',
        'modified'           => '更新日',
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

        $this->setTable('survey_answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SurveyQuestions', [
            'foreignKey' => 'survey_question_id',
            'joinType' => 'INNER'
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
            ->scalar('choices')
            ->maxLength('choices', 255)
            ->requirePresence('choices', 'create')
            ->notEmpty('choices');

        $validator
            ->scalar('quiz_options')
            ->maxLength('quiz_options', 255)
            ->allowEmpty('quiz_options');

        $validator
            ->integer('score')
            ->requirePresence('score', 'create')
            ->notEmpty('score');

        $validator
            ->integer('visible')
            ->requirePresence('visible', 'create')
            ->notEmpty('visible');

        $validator
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->integer('position')
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        $validator
            ->integer('weight')
            ->requirePresence('weight', 'create')
            ->notEmpty('weight');

        $validator
            ->integer('is_na')
            ->requirePresence('is_na', 'create')
            ->notEmpty('is_na');

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
        $rules->add($rules->existsIn(['survey_question_id'], 'SurveyQuestions'));

        return $rules;
    }
}
