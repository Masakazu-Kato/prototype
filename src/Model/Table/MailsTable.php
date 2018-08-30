<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * Mails Model
 */
class MailsTable extends Table
{

    protected static $_translationTable = [
        'id'               => 'ID',
        'student_id'       => '受講者ID',
        'user_id'          => 'ユーザーID',
        'subject'          => '題名',
        'mail_type_id'     => 'メールタイプID',
        'from'             => 'From',
        'to'               => 'To',
        'cc'               => 'Cc',
        'bcc'              => 'Bcc',
        'body'             => '内容',
        'raw'              => 'オリジナル',
        'status'           => 'ステータス',
        'mail_template_id' => 'タイプID',
        'error_code'       => 'エラーコード',
        'enable'           => '有効・無効',
        'created'          => '作成日',
        'modified'         => '更新日',

        'student'          => '受講者',
        'user'             => 'ユーザー',
        'mail_type'        => 'メールタイプ',
        'mail_template'    => 'メールテンプレート',

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

        $this->setTable('mails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MailTemplates', [
            'foreignKey' => 'mail_template_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('MailTypes', [
            'foreignKey' => 'mail_type_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
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
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->scalar('from')
            ->maxLength('from', 255)
            ->requirePresence('from', 'create')
            ->notEmpty('from');

        $validator
            ->scalar('to')
            ->maxLength('to', 255)
            ->requirePresence('to', 'create')
            ->notEmpty('to');

        $validator
            ->scalar('cc')
            ->maxLength('cc', 255)
            ->allowEmpty('cc');

        $validator
            ->scalar('bcc')
            ->maxLength('bcc', 255)
            ->allowEmpty('bcc');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->scalar('raw')
            ->requirePresence('raw', 'create')
            ->notEmpty('raw');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('error_code')
            ->maxLength('error_code', 255)
            ->allowEmpty('error_code');

        $validator
            ->integer('disabled')
            ->requirePresence('disabled', 'create')
            ->notEmpty('disabled');

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
        $rules->add($rules->existsIn(['mail_template_id'], 'MailTemplates'));
        $rules->add($rules->existsIn(['mail_type_id'], 'MailTypes'));
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
