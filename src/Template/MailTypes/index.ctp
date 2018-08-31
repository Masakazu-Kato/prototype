<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\MailTypesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">メールタイプ</li>
    </ol>
</section>
<section class="content">
    <?php if ($mailTypes): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', MailTypesTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('name', MailTypesTable::__('name')) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mailTypes as $mailType): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($mailType->id) ?></td>
                    <td><?= h($mailType->name) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
