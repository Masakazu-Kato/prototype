<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\ApplicationErrorsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-exclamation-triangle"></i>エラー</li>
    </ol>
    <a href="/application-errors/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($applicationErrors): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ApplicationErrorsTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('application', ApplicationErrorsTable::__('application_id')) ?></th>
                    <th><?= $this->Paginator->sort('error_code', ApplicationErrorsTable::__('error_code')) ?></th>
                    <th><?= $this->Paginator->sort('created', ApplicationErrorsTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', ApplicationErrorsTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applicationErrors as $applicationError): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($applicationError->id) ?></td>
                    <td><?= h($applicationError->application->name) ?></td>
                    <td><?= h($applicationError->error_code) ?></td>
                    <td><?= h($applicationError->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($applicationError->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $applicationError->id ], ['escape' => false])
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
