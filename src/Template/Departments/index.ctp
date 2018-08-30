<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\DepartmentsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">部門</li>
    </ol>
    <a href="/departments/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($departments): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', DepartmentsTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('name', DepartmentsTable::__('name')) ?></th>
                    <th><?= $this->Paginator->sort('enable', DepartmentsTable::__('enable')) ?></th>
                    <th><?= $this->Paginator->sort('created', DepartmentsTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', DepartmentsTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $department): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($department->id) ?></td>
                    <td><?= h($department->name) ?></td>
                    <td><?= h($enable[$department->enable]) ?></td>
                    <td><?= h($department->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($department->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $department->id ], ['escape' => false])
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
