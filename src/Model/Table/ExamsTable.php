<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * Exams Model
 */
class ExamsTable extends Table
{

    protected static $_translationTable = [
        'id'            => 'ID',
        'name'          => '名称',
        'text'          => '概略',
        'survey_id'     => 'アンケートID',
        'exam_due'      => '期限',
        'exam_start'    => '開始',
        'exam_end'      => '終了',
        'exam_minute'   => '時間',
        'number'        => '募集定員',
        'email'         => 'メールアドレス',
        'phone'         => '電話番号',
        'postcode'      => '郵便番号',
        'prefecture_id' => '都道府県ID',
        'municipality'  => '市区町村',
        'street'        => '番地',
        'building'      => '建物',
        'created'       => '作成日',
        'modified'      => '更新日',

        'survey'        => 'アンケート',
        'prefecture'    => '都道府県',

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

        $this->setTable('exams');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Surveys', [
            'foreignKey' => 'survey_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Prefectures', [
            'foreignKey' => 'prefecture_id',
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
            ->scalar('text')
            ->allowEmpty('text');

        $validator
            ->dateTime('exam_due')
            ->requirePresence('exam_due', 'create')
            ->notEmpty('exam_due');

        $validator
            ->dateTime('exam_start')
            ->requirePresence('exam_start', 'create')
            ->notEmpty('exam_start');

        $validator
            ->dateTime('exam_end')
            ->requirePresence('exam_end', 'create')
            ->notEmpty('exam_end');

        $validator
            ->integer('number')
            ->requirePresence('number', 'create')
            ->notEmpty('number');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmpty('phone');

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 7)
            ->allowEmpty('postcode');

        $validator
            ->scalar('municipality')
            ->maxLength('municipality', 255)
            ->allowEmpty('municipality');

        $validator
            ->scalar('street')
            ->maxLength('street', 255)
            ->allowEmpty('street');

        $validator
            ->scalar('building')
            ->maxLength('building', 255)
            ->allowEmpty('building');

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
        // $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['survey_id'], 'Surveys'));
        $rules->add($rules->existsIn(['prefecture_id'], 'Prefectures'));

        return $rules;
    }
}
