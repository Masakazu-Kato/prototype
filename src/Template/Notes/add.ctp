<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('notes/add.js', ['block' => 'script']) ?>
<?php use \App\Model\Table\NotesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="far fa-sticky-note"></i>ノート</li>
        <li class="breadcrumb-item"><a href="/tasks/">一覧</a></li>
        <li class="breadcrumb-item active">追加</li>
    </ol>
</section>
<section class="content">
    <?= $this->Form->create($note) ?>
    <table class="table table-bordered table-editable">
        <tr>
            <th><?= NotesTable::__('name') ?></th>
            <td>
                <?= $this->Form->control('name', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => '名称',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= NotesTable::__('text') ?></th>
            <td>
                <?= $this->Form->control('text', [
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
                    'options' => $students,
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= NotesTable::__('user') ?></th>
            <td>
                <?= $this->Form->control('user_id', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'options' => $users,
                ]) ?>
            </td>
        </tr>
    </table>
    <div class="action-button">
        <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
            'class' => 'btn btn-success', 'escape' => false
        ]) ?>
        <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', ['action' => 'index'], [
            'class' => ['btn', 'btn-dark'], 'escape' => false
        ]) ?>
    </div>
    <?= $this->Form->end() ?>
</section>
