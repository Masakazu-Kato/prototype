<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
// use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Library\ORM\Table;

/**
 * SendgridTemplates Model
 */
class SendgridTemplatesTable extends Table
{

    protected static $_translationTable = [
        'id'           => 'ID',
        'name'         => '名称',
        'generation'   => '',
        'version_id'   => 'バージョンID',
        'template_id'  => 'テンプレートID',
        'active'       => '有効・無効',
        'version_name' => 'バージョン名',
        'subject'      => '題名',
        'editor'       => '編集者',
        'updated_at'   => 'テンプレート更新日',
        'origin_id'    => 'テンプレート元ID',
        'created'      => '作成日',
        'modified'     => '更新日',
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

        $this->setTable('sendgrid_templates');
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
            ->scalar('generation')
            ->maxLength('generation', 255)
            ->requirePresence('generation', 'create')
            ->notEmpty('generation');

        $validator
            ->integer('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->scalar('version_name')
            ->maxLength('version_name', 255)
            ->requirePresence('version_name', 'create')
            ->notEmpty('version_name');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->scalar('editor')
            ->maxLength('editor', 255)
            ->requirePresence('editor', 'create')
            ->notEmpty('editor');

        $validator
            ->dateTime('updated_at')
            ->requirePresence('updated_at', 'create')
            ->notEmpty('updated_at');

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
        return $rules;
    }
}
