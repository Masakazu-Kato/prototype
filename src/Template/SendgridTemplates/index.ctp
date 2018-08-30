<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\SendgridTemplatesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">SendGridテンプレート</li>
    </ol>
</section>
<section class="content">
    <?php if ($sendgridTemplates): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', SendgridTemplatesTable::__('id')) ?></th>
                    <th><?= SendgridTemplatesTable::__('name') ?></th>
                    <th><?= SendgridTemplatesTable::__('template_id') ?></th>
                    <th><?= SendgridTemplatesTable::__('created') ?></th>
                    <th><?= SendgridTemplatesTable::__('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sendgridTemplates as $sendgridTemplate): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($sendgridTemplate->id) ?></td>
                    <td><?= h($sendgridTemplate->name) ?? '' ?></td>
                    <td><?= h($sendgridTemplate->template_id) ?? '' ?></td>
                    <td><?= h($sendgridTemplate->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($sendgridTemplate->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
