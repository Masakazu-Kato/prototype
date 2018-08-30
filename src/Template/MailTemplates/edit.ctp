<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('mail_templates/edit.js?' . time(), ['block' => 'script']) ?>
<?php use \App\Model\Table\MailTemplatesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item"><a href="/mail-templates/">メールテンプレート</a></li>
        <li class="breadcrumb-item active">編集</li>
    </ol>
</section>
<section class="content sandbox">
    <div class="sheet">
        <?= $this->Form->create($mailTemplate) ?>
        <table class="table table-bordered table-editable">
            <tr>
                <th><?= MailTemplatesTable::__('id') ?></th>
                <td><?= $this->Number->format($mailTemplate->id) ?></td>
            </tr>
            <tr>
                <th><?= MailTemplatesTable::__('name') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('name', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '名称',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= MailTemplatesTable::__('text') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('text', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '内容',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= MailTemplatesTable::__('template_id') ?></th>
                <td>
                    <?= $this->Form->control('template_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= MailTemplatesTable::__('enable') ?></th>
                <td>
                    <?= $this->Form->control('enable', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                        'options' => $enable
                    ]) ?>
                </td>
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
            <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
                'class' => 'btn btn-success', 'escape' => false
            ]) ?>
            <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', $action = ['action' => 'view', $mailTemplate->id], [
                'class' => ['btn', 'btn-dark'], 'escape' => false
            ]) ?>
            <?= $this->Form->button('<i class="glyphicon glyphicon-trash"></i>削除', [
                'class' => 'btn btn-danger',
                'name' => 'delete',
                'type' => 'button',
                'escape' => false
            ]) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
