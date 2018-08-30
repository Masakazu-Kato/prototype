<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * SurveyQuestions Model
 */
class SurveyQuestionsTable extends Table
{

    protected static $_translationTable = [
        'id'                 => 'ID',
        'survey_page_id'     => '',
        'sorting'            => '',
        'family'             => '',
        'subtype'            => '',
        'required'           => '',
        'visible'            => '',
        'href'               => '',
        'headings'           => '',
        'position'           => '',
        'validation'         => '',
        'forced_ranking'     => '',
        'origin_question_id' => '',
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

        $this->setTable('survey_questions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SurveyPages', [
            'foreignKey' => 'survey_page_id',
            'joinType' => 'INNER'
        ]);
        /*
        $this->belongsTo('OriginQuestions', [
            'foreignKey' => 'origin_question_id',
            'joinType' => 'INNER'
        ]);
        */
        $this->hasMany('SurveyAnswers', [
            'foreignKey' => 'survey_question_id'
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
            ->scalar('sorting')
            ->maxLength('sorting', 255)
            ->allowEmpty('sorting');

        $validator
            ->scalar('family')
            ->maxLength('family', 255)
            ->requirePresence('family', 'create')
            ->notEmpty('family');

        $validator
            ->scalar('subtype')
            ->maxLength('subtype', 255)
            ->requirePresence('subtype', 'create')
            ->notEmpty('subtype');

        $validator
            ->scalar('required')
            ->maxLength('required', 255)
            ->allowEmpty('required');

        $validator
            ->integer('visible')
            ->requirePresence('visible', 'create')
            ->notEmpty('visible');

        $validator
            ->scalar('href')
            ->maxLength('href', 255)
            ->requirePresence('href', 'create')
            ->notEmpty('href');

        $validator
            ->scalar('headings')
            ->requirePresence('headings', 'create')
            ->notEmpty('headings');

        $validator
            ->integer('position')
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        $validator
            ->scalar('validation')
            ->maxLength('validation', 255)
            ->allowEmpty('validation');

        $validator
            ->integer('forced_ranking')
            ->requirePresence('forced_ranking', 'create')
            ->notEmpty('forced_ranking');

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
        $rules->add($rules->existsIn(['survey_page_id'], 'SurveyPages'));
        // $rules->add($rules->existsIn(['origin_question_id'], 'OriginQuestions'));

        return $rules;
    }
}
