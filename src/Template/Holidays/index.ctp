<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\HolidaysTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">休日</li>
    </ol>
</section>
<section class="content">
    <?php if ($holidays): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', HolidaysTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('name', HolidaysTable::__('name')) ?></th>
                    <th><?= HolidaysTable::__('date') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($holidays as $holiday): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($holiday->id) ?></td>
                    <td><?= h($holiday->date->i18nFormat('yyyy年M月d日')) ?></td>
                    <td><?= h($holiday->name) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
