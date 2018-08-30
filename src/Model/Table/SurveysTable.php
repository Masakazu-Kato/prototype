<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * Surveys Model
 */
class SurveysTable extends Table
{

    protected static $_translationTable = [
        'id'               => 'ID',
        'title'            => 'タイトル',
        'href'             => 'URL',
        'page_count'       => 'ページ数',
        'question_count'   => '設問数',
        'response_count'   => '回答数',
        'collect_url'      => '集計URL',
        'preview'          => 'プレビューURL',
        'edit_url'         => '編集URL',
        'analyze_url'      => '分析URL',
        'summary_url'      => 'サマリーURL',
        'is_owner'         => '所有者',
        'footer'           => 'フッター',
        'buttons_text'     => 'ボタン',
        'folder_id'        => 'フォルダID',
        'language'         => '言語',
        'custom_valiables' => 'カスタム変数',
        'category'         => 'カテゴリー',
        'nickname'         => 'ニックネーム',
        'origin_survey_id' => 'SurveyMonkey元ID',
        'created'          => '作成日',
        'modified'         => '更新日',
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

        $this->setTable('surveys');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        /*
        $this->belongsTo('Folders', [
            'foreignKey' => 'folder_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OriginSurveys', [
            'foreignKey' => 'origin_survey_id',
            'joinType' => 'INNER'
        ]);
        */
        $this->hasMany('SurveyPages', [
            'foreignKey' => 'survey_id'
        ]);

        $this->belongsToMany('Students');

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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('href')
            ->maxLength('href', 255)
            ->requirePresence('href', 'create')
            ->notEmpty('href');

        $validator
            ->integer('page_count')
            ->requirePresence('page_count', 'create')
            ->notEmpty('page_count');

        $validator
            ->integer('question_count')
            ->requirePresence('question_count', 'create')
            ->notEmpty('question_count');

        $validator
            ->integer('response_count')
            ->requirePresence('response_count', 'create')
            ->notEmpty('response_count');

        $validator
            ->scalar('collect_url')
            ->maxLength('collect_url', 255)
            ->requirePresence('collect_url', 'create')
            ->notEmpty('collect_url');

        $validator
            ->scalar('preview')
            ->maxLength('preview', 255)
            ->requirePresence('preview', 'create')
            ->notEmpty('preview');

        $validator
            ->scalar('edit_url')
            ->maxLength('edit_url', 255)
            ->requirePresence('edit_url', 'create')
            ->notEmpty('edit_url');

        $validator
            ->scalar('analyze_url')
            ->maxLength('analyze_url', 255)
            ->requirePresence('analyze_url', 'create')
            ->notEmpty('analyze_url');

        $validator
            ->scalar('summary_url')
            ->maxLength('summary_url', 255)
            ->requirePresence('summary_url', 'create')
            ->notEmpty('summary_url');

        $validator
            ->integer('is_owner')
            ->requirePresence('is_owner', 'create')
            ->notEmpty('is_owner');

        $validator
            ->integer('footer')
            ->requirePresence('footer', 'create')
            ->notEmpty('footer');

        $validator
            ->scalar('buttons_text')
            ->requirePresence('buttons_text', 'create')
            ->notEmpty('buttons_text');

        $validator
            ->scalar('language')
            ->maxLength('language', 255)
            ->requirePresence('language', 'create')
            ->notEmpty('language');

        $validator
            ->scalar('custom_variables')
            ->requirePresence('custom_variables', 'create')
            ->notEmpty('custom_variables');

        $validator
            ->scalar('category')
            ->maxLength('category', 255)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

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
        // $rules->add($rules->existsIn(['folder_id'], 'Folders'));
        // $rules->add($rules->existsIn(['origin_survey_id'], 'OriginSurveys'));

        return $rules;
    }
}
