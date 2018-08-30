<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\UsersTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">アカウント</li>
    </ol>
    <a href="/users/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($users): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', UsersTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('lastname', UsersTable::__('lastname')) ?></th>
                    <th><?= $this->Paginator->sort('firstname', UsersTable::__('firstname')) ?></th>
                    <th><?= $this->Paginator->sort('lastname_kana', UsersTable::__('lastname_kana')) ?></th>
                    <th><?= $this->Paginator->sort('firstname_kana', UsersTable::__('firstname_kana')) ?></th>
                    <th><?= $this->Paginator->sort('email', UsersTable::__('email')) ?></th>
                    <th><?= $this->Paginator->sort('enable', UsersTable::__('enable')) ?></th>
                    <th><?= $this->Paginator->sort('created', UsersTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', UsersTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr<?php if ($user->enable !== 1) echo ' class="table-active"' ?>>
                    <td class="text-center"><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->lastname) ?></td>
                    <td><?= h($user->firstname) ?></td>
                    <td><?= h($user->lastname_kana) ?></td>
                    <td><?= h($user->firstname_kana) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($enable[$user->enable]) ?></td>
                    <td><?= h($user->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($user->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $user->id ], ['escape' => false])
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
