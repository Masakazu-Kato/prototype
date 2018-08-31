<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\TasksTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-tasks"></i>タスク</li>
        <li class="breadcrumb-item"><a href="/tasks/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$task): ?>
    <?= $this->Form->create($task, ['name' => 'add', 'type' => 'post', 'url' => '/tasks/add/2']) ?>
    <?= $this->Form->control('segment_id', ['id' => false, 'type' => 'hidden', 'value' => 1]) ?>
    <?= $this->Form->control('customer_id', ['id' => false, 'type' => 'hidden', 'value' => $task->id]) ?>
    <?php endif ?>
</section>
<div class="row">
    <div class="col-md-8">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= TasksTable::__('id') ?></th>
                        <td><?= h($task->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= TasksTable::__('name') ?></th>
                        <td><?= h($task->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= TasksTable::__('text') ?></th>
                        <td><?= h($task->text) ?></td>
                    </tr>
                    <tr>
                        <th><?= TasksTable::__('start') ?></th>
                        <td><?= h($task->start->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= TasksTable::__('end') ?></th>
                        <td><?= h($task->end->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= TasksTable::__('user') ?></th>
                        <td><?= h($task->user['full_name']) ?></td>
                    </tr>
                    <tr>
                        <th><?= TasksTable::__('student') ?></th>
                        <td><?= h($task->student['full_name']) ?></td>
                    </tr>
                    <tr>
                        <th><?= TasksTable::__('assign') ?></th>
                        <td><?= h($task->assign['full_name']) ?></td>
                    </tr>
                    <tr>
                        <th><?= TasksTable::__('task_status') ?></th>
                        <td><?= h($task->task_status['name']) ?></td>
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
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $task->id], [
                        'class' => ['btn', 'btn-success'],
                        'escape' => false,
                    ]) ?>
                    <?= $this->Html->link('<i class="fas fa-chevron-circle-left"></i>戻る', ['action' => 'index'], [
                        'class' => ['btn', 'btn-warning'],
                        'escape' => false,
                    ]) ?>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4">
        <section class="content sandbox">
            <div class="sheet">
                <?php if ($task->user): ?>
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= $task->user['id'] ?></th>
                        <td><?= h($task->user['full_name']) ?? '' ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if ($task->student): ?>
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= $task->student['id'] ?></th>
                        <td><?= h($task->student['full_name']) ?? '' ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if ($task->assign): ?>
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= $task->assign['id'] ?></th>
                        <td><?= h($task->assign['full_name']) ?? '' ?></td>
                    </tr>
                </table>
                <?php endif ?>
            </div>
        </section>
    </div>
</div>
