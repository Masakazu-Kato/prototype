<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * ShortUrls Model
 */
class ShortUrlsTable extends Table
{

    protected static $_translationTable = [
        'id'          => 'ID',
        'url'         => '短縮URL',
        'long_url'    => 'URL',
        'status_code' => 'ステータスコード',
        'status_text' => 'ステータス',
        'hash'        => 'ハッシュ値',
        'global_hash' => 'グローバルハッシュ値',
        'new_hash'    => '新規発行',
        'student_id'  => '受講者ID',
        'survey_id'   => '試験ID',
        'created'     => '作成日',
        'modified'    => '更新日',

        'student'     => '受講者',
        'survey'      => '試験',

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

        $this->setTable('short_urls');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Surveys', [
            'foreignKey' => 'survey_id',
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
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmpty('url');

        $validator
            ->scalar('long_url')
            ->maxLength('long_url', 255)
            ->allowEmpty('long_url');

        $validator
            ->integer('status_code')
            ->requirePresence('status_code', 'create')
            ->notEmpty('status_code');

        $validator
            ->scalar('status_text')
            ->maxLength('status_text', 255)
            ->allowEmpty('status_text');

        $validator
            ->scalar('hash')
            ->maxLength('hash', 255)
            ->allowEmpty('hash');

        $validator
            ->scalar('global_hash')
            ->maxLength('global_hash', 255)
            ->allowEmpty('global_hash');

        $validator
            ->integer('new_hash')
            ->requirePresence('new_hash', 'create')
            ->notEmpty('new_hash');

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
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['survey_id'], 'Surveys'));

        return $rules;
    }
}
