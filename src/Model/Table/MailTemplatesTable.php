<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * MailTemplates Model
 */
class MailTemplatesTable extends Table
{

    protected static $_translationTable = [
        'id'          => 'ID',
        'name'        => '名称',
        'text'        => '内容',
        'template_id' => '連携システムID',
        'enable'      => '有効・無効',
        'created'     => '作成日',
        'modified'    => '更新日',
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

        $this->setTable('mail_templates');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->scalar('tempplate_id')
            ->maxLength('tempplate_id', 255)
            ->requirePresence('tempplate_id', 'create')
            ->notEmpty('tempplate_id');

        $validator
            ->integer('enable')
            ->requirePresence('enable', 'create')
            ->notEmpty('enable');

        return $validator;
    }
}
