<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('tasks/edit.js?' . time(), ['block' => 'script']) ?>
<?php use \App\Model\Table\TasksTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item"><a href="/tasks/">タスク</a></li>
        <li class="breadcrumb-item active">編集</li>
    </ol>
</section>
<section class="content sandbox">
    <div class="sheet">
        <?= $this->Form->create($task) ?>
        <table class="table table-bordered table-editable">
            <tr>
                <th><?= TasksTable::__('id') ?></th>
                <td><?= $this->Number->format($task->id) ?></td>
            </tr>
            <tr>
                <th><?= TasksTable::__('name') ?></th>
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
                <th><?= TasksTable::__('text') ?></th>
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
                <th><?= TasksTable::__('start') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('start', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '開始',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= TasksTable::__('end') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('start', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '終了',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= TasksTable::__('user') ?></th>
                <td>
                    <?= $this->Form->control('user_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                        'options' => $users
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= TasksTable::__('student') ?></th>
                <td>
                    <?= $this->Form->control('student_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                        'options' => $students
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= TasksTable::__('assign') ?></th>
                <td>
                    <?= $this->Form->control('assign_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                        'options' => $assigns
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= TasksTable::__('task_status') ?></th>
                <td>
                    <?= $this->Form->control('task_status_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                        'options' => $taskStatuses
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= TasksTable::__('created') ?></th>
                <td><?= h($task->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= TasksTable::__('modified') ?></th>
                <td><?= h($task->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
        </table>
        <div class="action-button">
            <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
                'class' => 'btn btn-success', 'escape' => false
            ]) ?>
            <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', $action = ['action' => 'view', $task->id], [
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
