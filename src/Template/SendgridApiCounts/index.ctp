<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\SendgridApiCountsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">SendgridApi</li>
    </ol>
</section>
<section class="content">
    <?php if ($sendgridApiCounts): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', SendgridApiCountsTable::__('id')) ?></th>
                    <th><?= SendgridApiCountsTable::__('date') ?></th>
                    <th><?= SendgridApiCountsTable::__('day_limit') ?></th>
                    <th><?= SendgridApiCountsTable::__('day_remaining') ?></th>
                    <th><?= SendgridApiCountsTable::__('day_reset') ?></th>
                    <th><?= SendgridApiCountsTable::__('created') ?></th>
                    <th><?= SendgridApiCountsTable::__('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sendgridApiCounts as $sendgridApiCount): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($sendgridApiCount->id) ?></td>
                    <td><?= h($sendgridApiCount->date->i18nFormat('yyyy年M月d日')) ?? '' ?></td>
                    <td><?= h($sendgridApiCount->day_limit) ?? '' ?></td>
                    <td><?= h($sendgridApiCount->day_remaining) ?? '' ?></td>
                    <td><?= h($sendgridApiCount->day_reset) ?? '' ?></td>
                    <td><?= h($sendgridApiCount->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($sendgridApiCount->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
