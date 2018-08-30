<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\PrefecturesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">都道府県</li>
    </ol>
</section>
<section class="content">
    <?php if ($prefectures): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', PrefecturesTable::__('id')) ?></th>
                    <th><?= PrefecturesTable::__('name') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prefectures as $prefecture): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($prefecture->id) ?></td>
                    <td><?= h($prefecture->name) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
