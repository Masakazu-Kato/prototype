<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * SendgridApiCounts Model
 */
class SendgridApiCountsTable extends Table
{

    protected static $_translationTable = [
        'id'            => 'ID',
        'date'          => '対象日',
        'day_limit'     => '上限',
        'day_remaining' => '残り',
        'day_reset'     => 'リセット',
        'created'       => '作成日',
        'modified'      => '更新日',
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

        $this->setTable('sendgrid_api_counts');
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
            ->integer('day_limit')
            ->requirePresence('day_limit', 'create')
            ->notEmpty('day_limit');

        $validator
            ->integer('day_remaining')
            ->requirePresence('day_remaining', 'create')
            ->notEmpty('day_remaining');

        $validator
            ->integer('day_reset')
            ->requirePresence('day_reset', 'create')
            ->notEmpty('day_reset');

        return $validator;
    }
}
