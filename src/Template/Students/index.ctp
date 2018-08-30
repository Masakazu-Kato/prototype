<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\StudentsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-user"></i>受講者</li>
    </ol>
    <a href="/students/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($students): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', StudentsTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('lastname', StudentsTable::__('lastname')) ?></th>
                    <th><?= $this->Paginator->sort('firstname', StudentsTable::__('firstname')) ?></th>
                    <th><?= $this->Paginator->sort('lastname_kana', StudentsTable::__('lastname_kana')) ?></th>
                    <th><?= $this->Paginator->sort('firstname_kana', StudentsTable::__('firstname_kana')) ?></th>
                    <th><?= $this->Paginator->sort('email', StudentsTable::__('email')) ?></th>
                    <th><?= $this->Paginator->sort('phone', StudentsTable::__('phone')) ?></th>
                    <th><?= $this->Paginator->sort('modified', StudentsTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($student->id) ?></td>
                    <td><?= h($student->lastname) ?></td>
                    <td><?= h($student->firstname) ?></td>
                    <td><?= h($student->lastname_kana) ?></td>
                    <td><?= h($student->firstname_kana) ?></td>
                    <td><?= h($student->email) ?></td>
                    <td><?= h($student->phone) ?></td>
                    <td><?= h($student->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $student->id ], ['escape' => false])
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
