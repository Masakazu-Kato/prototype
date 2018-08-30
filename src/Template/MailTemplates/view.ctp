<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\MailTemplatesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>メールテンプレート</li>
        <li class="breadcrumb-item"><a href="/mail-templates/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$mailTemplate): ?>
    <?= $this->Form->create($mailTemplate, ['name' => 'add', 'type' => 'post', 'url' => '/roles/add/2']) ?>
    <?= $this->Form->control('segment_id', ['id' => false, 'type' => 'hidden', 'value' => 1]) ?>
    <?= $this->Form->control('customer_id', ['id' => false, 'type' => 'hidden', 'value' => $mailTemplate->id]) ?>
    <?php endif ?>
</section>
<div class="row">
    <div class="col-md-9">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= MailTemplatesTable::__('id') ?></th>
                        <td><?= h($mailTemplate->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= MailTemplatesTable::__('name') ?></th>
                        <td><?= h($mailTemplate->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= MailTemplatesTable::__('text') ?></th>
                        <td><?= h($mailTemplate->text) ?></td>
                    </tr>
                    <tr>
                        <th><?= MailTemplatesTable::__('template_id') ?></th>
                        <td><?= h($mailTemplate->template_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= MailTemplatesTable::__('enable') ?></th>
                        <td><?= h($enable[$mailTemplate->enable]) ?></td>
                    </tr>
                    <tr>
                        <th><?= MailTemplatesTable::__('created') ?></th>
                        <td><?= h($mailTemplate->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= MailTemplatesTable::__('modified') ?></th>
                        <td><?= h($mailTemplate->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                </table>
                <div class="action-button">
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $mailTemplate->id], [
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
    </div>
    <div class="col-md-3">
        <section class="content sandbox">
            <div class="sheet">
            </div>
        </section>
    </div>
</div>
