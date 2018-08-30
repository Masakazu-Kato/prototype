<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * Answers Model
 */
class AnswersTable extends Table
{

    protected static $_translationTable = [
        'id'                => 'ID',
        'response_status'   => '',
        'ip_address'        => '',
        'total_time'        => '',
        'href'              => '',
        'analyze_url'       => '',
        'edit_url'          => '',
        'recipient_id'      => '',
        'collector_id'      => '',
        'collection_mode'   => '',
        'collection_mode'   => '',
        'custom_variables'  => '',
        'page_path'         => '',
        'logic_path'        => '',
        'metadata'          => '',
        'origin_id'         => '',
        'origin_survey_id'  => '',
        'created'           => '作成日',
        'modified'          => '更新日',
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

        $this->setTable('answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        /*
        $this->belongsTo('Recipients', [
            'foreignKey' => 'recipient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Collectors', [
            'foreignKey' => 'collector_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Origins', [
            'foreignKey' => 'origin_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OriginSurveys', [
            'foreignKey' => 'origin_survey_id',
            'joinType' => 'INNER'
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
            ->scalar('response_status')
            ->maxLength('response_status', 255)
            ->requirePresence('response_status', 'create')
            ->notEmpty('response_status');

        $validator
            ->scalar('ip_address')
            ->maxLength('ip_address', 255)
            ->requirePresence('ip_address', 'create')
            ->notEmpty('ip_address');

        $validator
            ->integer('total_time')
            ->requirePresence('total_time', 'create')
            ->notEmpty('total_time');

        $validator
            ->scalar('href')
            ->maxLength('href', 255)
            ->requirePresence('href', 'create')
            ->notEmpty('href');

        $validator
            ->scalar('analyze_url')
            ->maxLength('analyze_url', 255)
            ->requirePresence('analyze_url', 'create')
            ->notEmpty('analyze_url');

        $validator
            ->scalar('edit_url')
            ->maxLength('edit_url', 255)
            ->requirePresence('edit_url', 'create')
            ->notEmpty('edit_url');

        $validator
            ->scalar('collection_mode')
            ->maxLength('collection_mode', 255)
            ->requirePresence('collection_mode', 'create')
            ->notEmpty('collection_mode');

        $validator
            ->scalar('custom_value')
            ->requirePresence('custom_value', 'create')
            ->notEmpty('custom_value');

        $validator
            ->scalar('custom_variables')
            ->requirePresence('custom_variables', 'create')
            ->notEmpty('custom_variables');

        $validator
            ->scalar('page_path')
            ->requirePresence('page_path', 'create')
            ->notEmpty('page_path');

        $validator
            ->scalar('logic_path')
            ->requirePresence('logic_path', 'create')
            ->notEmpty('logic_path');

        $validator
            ->scalar('metadata')
            ->requirePresence('metadata', 'create')
            ->notEmpty('metadata');

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
        // $rules->add($rules->existsIn(['recipient_id'], 'Recipients'));
        // $rules->add($rules->existsIn(['collector_id'], 'Collectors'));
        // $rules->add($rules->existsIn(['origin_id'], 'Origins'));
        // $rules->add($rules->existsIn(['origin_survey_id'], 'OriginSurveys'));

        return $rules;
    }
}
