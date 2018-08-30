<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\RolesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">役割</li>
    </ol>
    <a href="/roles/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($roles): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', RolesTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('name', RolesTable::__('name')) ?></th>
                    <th><?= $this->Paginator->sort('enable', RolesTable::__('enable')) ?></th>
                    <th><?= $this->Paginator->sort('created', RolesTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', RolesTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                <tr<?php if ($role->enable !== 1) echo ' class="table-active"' ?>>
                    <td class="text-center"><?= $this->Number->format($role->id) ?></td>
                    <td><?= h($role->name) ?></td>
                    <td><?= h($enable[$role->enable]) ?></td>
                    <td><?= h($role->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($role->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $role->id ], ['escape' => false])
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
