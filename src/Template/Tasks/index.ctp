<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\TasksTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-tasks"></i>タスク</li>
    </ol>
    <a href="/tasks/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($tasks): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', TasksTable::__('id')) ?></th>
                    <th><?= TasksTable::__('name') ?></th>
                    <th><?= TasksTable::__('text') ?></th>

                    <th><?= TasksTable::__('user') ?></th>
                    <th><?= TasksTable::__('student') ?></th>
                    <th><?= TasksTable::__('assign') ?></th>

                    <th><?= TasksTable::__('task_status') ?></th>

                    <th><?= $this->Paginator->sort('created', TasksTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', TasksTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr<?php if (in_array($task->task_status_id,[3,4],true)) echo ' class="table-active"' ?>>
                    <td class="text-center"><?= $this->Number->format($task->id) ?></td>
                    <td><?= h($task->name) ?></td>
                    <td><?= h($task->text) ?></td>

                    <td><?= h($task->user['full_name']) ?></td>
                    <td><?= h($task->student['full_name']) ?></td>
                    <td><?= h($task->assign['full_name']) ?></td>


                    <td><?= h($task->task_status['name']) ?></td>
                    <td><?= h($task->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($task->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $task->id ], ['escape' => false])
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
