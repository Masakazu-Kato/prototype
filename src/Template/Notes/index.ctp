<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\NotesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="far fa-sticky-note"></i>ノート</li>
    </ol>
    <a href="/notes/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($notes): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', NotesTable::__('id')) ?></th>
                    <th><?= NotesTable::__('name') ?></th>
                    <th><?= NotesTable::__('text') ?></th>

                    <th><?= NotesTable::__('student') ?></th>
                    <th><?= NotesTable::__('user') ?></th>

                    <th><?= $this->Paginator->sort('created', NotesTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', NotesTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notes as $note): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($note->id) ?></td>
                    <td><?= h($note->name) ?></td>
                    <td><?= h($note->text) ?></td>

                    <td><?= h($note->student['full_name']) ?></td>
                    <td><?= h($note->user['full_name']) ?></td>

                    <td><?= h($note->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($note->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $note->id ], ['escape' => false])
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
