<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\ApplicationsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">API</li>
    </ol>
</section>
<section class="content">
    <?php if ($applications): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ApplicationsTable::__('id')) ?></th>
                    <th><?= ApplicationsTable::__('name') ?></th>
                    <th><?= ApplicationsTable::__('enable') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($application->id) ?></td>
                    <td><?= h($application->name) ?></td>
                    <td><?= h($enable[$application->enable]) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
