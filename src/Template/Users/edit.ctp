<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('users/edit.js?' . time(), ['block' => 'script']) ?>
<?php use \App\Model\Table\UsersTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item"><a href="/users">アカウント</a></li>
        <li class="breadcrumb-item active">編集</li>
    </ol>
</section>
<section class="content sandbox">
    <div class="sheet">
        <?= $this->Form->create($user) ?>
        <table class="table table-bordered table-editable">
            <tr>
                <th><?= UsersTable::__('id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th><?= UsersTable::__('name') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('firstname', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '名',
                        ]) ?>
                        <?= $this->Form->control('lastname', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '名',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= UsersTable::__('kana') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('firstname_kana', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'シ',
                        ]) ?>
                        <?= $this->Form->control('lastname_kana', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'メイ',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= UsersTable::__('phone') ?></th>
                <td>
                    <?= $this->Form->control('phone', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= UsersTable::__('email') ?></th>
                <td>
                    <?= $this->Form->control('email', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= UsersTable::__('password') ?></th>
                <td>
                    <?= $this->Form->control('password', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= UsersTable::__('enable') ?></th>
                <td>
                    <?= $this->Form->control('enable', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= UsersTable::__('created') ?></th>
                <td><?= h($user->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= UsersTable::__('modified') ?></th>
                <td><?= h($user->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
        </table>
        <div class="action-button">
            <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
                'class' => 'btn btn-success', 'escape' => false
            ]) ?>
            <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', $action = ['action' => 'view', $user->id], [
                'class' => ['btn', 'btn-dark'], 'escape' => false
            ]) ?>
            <?= $this->Form->button('<i class="glyphicon glyphicon-trash"></i>削除', [
                'class' => 'btn btn-danger',
                'name' => 'delete',
                'type' => 'button',
                'escape' => false
            ]) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
