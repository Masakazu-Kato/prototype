<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\DepartmentsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>部門</li>
        <li class="breadcrumb-item"><a href="/departments/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$department): ?>
    <?= $this->Form->create($department, ['name' => 'add', 'type' => 'post', 'url' => '/departments/add/2']) ?>
    <?php endif ?>
</section>
<div class="row">
    <div class="col-md-8">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= DepartmentsTable::__('id') ?></th>
                        <td><?= h($department->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= DepartmentsTable::__('name') ?></th>
                        <td><?= h($department->name) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= DepartmentsTable::__('enable') ?></th>
                        <td><?= h($enable[$department->enable]) ?></td>
                    </tr>
                    <tr>
                        <th><?= DepartmentsTable::__('created') ?></th>
                        <td><?= h($department->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= DepartmentsTable::__('modified') ?></th>
                        <td><?= h($department->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <?php
                        // var_dump($department->users);
                    ?>
                </table>
                <div class="action-button">
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $department->id], [
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
                <?php if($department->users): ?>
                <h6>所属ユーザー</h6>
                <table class="table table-bordered table-plane">
                    <?php foreach ($department->users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->full_name) ?? '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif ?>
            </div>
        </section>
    </div>
</div>
