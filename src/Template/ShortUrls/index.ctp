<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\ShortUrlsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">短縮URL</li>
    </ol>
</section>
<section class="content">
    <?php if ($shortUrls): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ShortUrlsTable::__('id')) ?></th>
                    <th><?= ShortUrlsTable::__('name') ?></th>
                    <th><?= ShortUrlsTable::__('template_id') ?></th>
                    <th><?= ShortUrlsTable::__('created') ?></th>
                    <th><?= ShortUrlsTable::__('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shortUrls as $shortUrl): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($shortUrl->id) ?></td>
                    <td><?= h($shortUrl->name) ?? '' ?></td>
                    <td><?= h($shortUrl->template_id) ?? '' ?></td>
                    <td><?= h($shortUrl->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($shortUrl->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
