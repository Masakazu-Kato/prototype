<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\ShortMessagesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-comment"></i>設定管理</li>
        <li class="breadcrumb-item active">SMS</li>
    </ol>
</section>
<section class="content">
    <?php if ($shortMessages): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ShortMessagesTable::__('id')) ?></th>
                    <th><?= ShortMessagesTable::__('user') ?></th>
                    <th><?= ShortMessagesTable::__('student') ?></th>
                    <th><?= ShortMessagesTable::__('body') ?></th>
                    <th><?= ShortMessagesTable::__('status') ?></th>
                    <th><?= ShortMessagesTable::__('created') ?></th>
                    <th><?= ShortMessagesTable::__('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shortMessages as $shortMessage): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($shortMessage->id) ?></td>
                    <td><?= h($shortMessage->user['full_name']) ?? '' ?></td>
                    <td><?= h($shortMessage->student['full_name']) ?? '' ?></td>
                    <td><?= h($shortMessage->body) ?></td>
                    <td><?= h($shortMessage->status) ?></td>
                    <td><?= h($shortMessage->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($shortMessage->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
