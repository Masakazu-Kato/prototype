<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\MailTemplatesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">メールテンプレート</li>
    </ol>
    <a href="/mailTemplates/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($mailTemplates): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', MailTemplatesTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('name', MailTemplatesTable::__('name')) ?></th>
                    <th><?= $this->Paginator->sort('enable', MailTemplatesTable::__('enable')) ?></th>
                    <th><?= $this->Paginator->sort('created', MailTemplatesTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', MailTemplatesTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mailTemplates as $mailTemplate): ?>
                <tr<?php if ($mailTemplate->enable !== 1) echo ' class="table-active"' ?>>
                    <td class="text-center"><?= $this->Number->format($mailTemplate->id) ?></td>
                    <td><?= h($mailTemplate->name) ?></td>
                    <td><?= h($enable[$mailTemplate->enable]) ?></td>
                    <td><?= h($mailTemplate->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($mailTemplate->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $mailTemplate->id ], ['escape' => false])
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
