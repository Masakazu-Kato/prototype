<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * Users Model
 */
class UsersTable extends Table
{

    protected static $_translationTable = [
        'id'             => 'ID',
        'password'       => 'パスワード',
        'lastname'       => '姓',
        'firstname'      => '名',
        'lastname_kana'  => 'セイ',
        'firstname_kana' => 'メイ',
        'email'          => 'メールアドレス',
        'phone'          => '電話番号',
        'postcode'       => '郵便番号',
        'prefecture_id'  => '都道府県ID',
        'municipality'   => '市区町村',
        'street'         => '番地',
        'building'       => '建物',
        'birthday'       => '生年月日',
        'enable'         => '有効・無効',
        'token'          => 'トークン',
        'created'        => '作成日',
        'modified'       => '更新日',

        'name'           => '氏名',
        'kana'           => 'フリガナ',
        'prefecture'     => '都道府県',

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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Prefectures', [
            'foreignKey' => 'prefecture_id',
            'joinType' => 'LEFT'
        ]);

        $this->hasMany('Mails', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Notes', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('ShortMessages', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Tasks', [
            'foreignKey' => 'user_id'
        ]);

/*
        $this->hasMany('RoleUsers', [
            'foreignKey' => 'user_id'
        ]);
*/

        $this->belongsToMany('Departments');
        $this->belongsToMany('Roles');



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
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 16)
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 16)
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->scalar('lastname_kana')
            ->maxLength('lastname_kana', 16)
            ->requirePresence('lastname_kana', 'create')
            ->notEmpty('lastname_kana');

        $validator
            ->scalar('firstname_kana')
            ->maxLength('firstname_kana', 16)
            ->requirePresence('firstname_kana', 'create')
            ->notEmpty('firstname_kana');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('enable')
            ->requirePresence('enable', 'create')
            ->notEmpty('enable');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmpty('token');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['prefecture_id'], 'Prefectures'));

        return $rules;
    }
}
