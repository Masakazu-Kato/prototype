<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * SurveyMonkeyApiCounts Model
 */
class SurveyMonkeyApiCountsTable extends Table
{

    protected static $_translationTable = [
        'id'                      => 'ID',
        'date'                    => '対象日',
        'global_minute_limit'     => '上限',
        'global_minute_remaining' => '残り',
        'global_minute_reset'     => 'リセット',
        'global_day_limit'        => '上限',
        'global_day_remaining'    => '残り',
        'global_day_reset'        => 'リセット',
        'created'                 => '作成日',
        'modified'                => '更新日',
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

        $this->setTable('survey_monkey_api_counts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->integer('global_minute_limit')
            ->requirePresence('global_minute_limit', 'create')
            ->notEmpty('global_minute_limit');

        $validator
            ->integer('global_minute_remaining')
            ->requirePresence('global_minute_remaining', 'create')
            ->notEmpty('global_minute_remaining');

        $validator
            ->integer('global_minute_reset')
            ->requirePresence('global_minute_reset', 'create')
            ->notEmpty('global_minute_reset');

        $validator
            ->integer('global_day_limit')
            ->requirePresence('global_day_limit', 'create')
            ->notEmpty('global_day_limit');

        $validator
            ->integer('global_day_remaining')
            ->requirePresence('global_day_remaining', 'create')
            ->notEmpty('global_day_remaining');

        $validator
            ->integer('global_day_reset')
            ->requirePresence('global_day_reset', 'create')
            ->notEmpty('global_day_reset');

        return $validator;
    }
}
