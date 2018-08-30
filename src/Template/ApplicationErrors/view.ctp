<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\ApplicationErrorsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-exclamation-triangle"></i>エラー</li>
        <li class="breadcrumb-item"><a href="/application-errors/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$applicationError): ?>
    <?= $this->Form->create($applicationError, ['name' => 'add', 'type' => 'post', 'url' => '/notes/add/2']) ?>
    <?= $this->Form->control('segment_id', ['id' => false, 'type' => 'hidden', 'value' => 1]) ?>
    <?= $this->Form->control('customer_id', ['id' => false, 'type' => 'hidden', 'value' => $applicationError->id]) ?>
    <?php endif ?>
</section>
<section class="content sandbox">
    <div class="sheet">
        <table class="table table-bordered table-plane">
            <tr>
                <th><?= ApplicationErrorsTable::__('id') ?></th>
                <td><?= h($applicationError->id) ?></td>
            </tr>
            <tr>
                <th><?= ApplicationErrorsTable::__('application') ?></th>
                <td><?= h($applicationError->application->name) ?></td>
            </tr>
            <tr>
                <th><?= ApplicationErrorsTable::__('error_code') ?></th>
                <td><?= h($applicationError->error_code) ?></td>
            </tr>
            <tr>
                <th><?= ApplicationErrorsTable::__('raw') ?></th>
                <td><?= h($applicationError->raw) ?></td>
            </tr>
            <tr>
                <th><?= ApplicationErrorsTable::__('created') ?></th>
                <td><?= h($applicationError->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= ApplicationErrorsTable::__('modified') ?></th>
                <td><?= h($applicationError->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
        </table>
        <div class="action-button">
            <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $applicationError->id], [
                'class' => ['btn', 'btn-success'],
                'escape' => false,
            ]) ?>
            <?= $this->Html->link('<i class="fas fa-chevron-circle-left"></i>戻る', ['action' => 'index'], [
                'class' => ['btn', 'btn-warning'],
                'escape' => false,
            ]) ?>
        </div>
    </div>
</section>
