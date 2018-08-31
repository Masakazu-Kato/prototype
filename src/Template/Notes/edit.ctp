<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('notes/edit.js', ['block' => 'script']) ?>
<?php use \App\Model\Table\NotesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item"><a href="/notes/">ノート</a></li>
        <li class="breadcrumb-item active">編集</li>
    </ol>
</section>
<section class="content sandbox">
    <div class="sheet">
        <?= $this->Form->create($note) ?>
        <table class="table table-bordered table-editable">
            <tr>
                <th><?= NotesTable::__('id') ?></th>
                <td><?= $this->Number->format($note->id) ?></td>
            </tr>
            <tr>
                <th><?= NotesTable::__('name') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('name', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '名称',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= NotesTable::__('text') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('text', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '内容',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= NotesTable::__('user') ?></th>
                <td>
                    <?= $this->Form->control('user_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= NotesTable::__('student') ?></th>
                <td>
                    <?= $this->Form->control('student_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= NotesTable::__('created') ?></th>
                <td><?= h($note->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= NotesTable::__('modified') ?></th>
                <td><?= h($note->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
        </table>
        <div class="action-button">
            <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
                'class' => 'btn btn-success', 'escape' => false
            ]) ?>
            <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', $action = ['action' => 'view', $note->id], [
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
