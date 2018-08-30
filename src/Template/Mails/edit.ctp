<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('mails/edit.js?' . time(), ['block' => 'script']) ?>
<?php use \App\Model\Table\MailsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item"><a href="/mails/">メール</a></li>
        <li class="breadcrumb-item active">編集</li>
    </ol>
</section>
<section class="content sandbox">
    <div class="sheet">
        <?= $this->Form->create($mail) ?>
        <table class="table table-bordered table-editable">
            <tr>
                <th><?= MailsTable::__('id') ?></th>
                <td><?= $this->Number->format($mail->id) ?></td>
            </tr>
            <tr>
                <th><?= MailsTable::__('name') ?></th>
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
                <th><?= MailsTable::__('text') ?></th>
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
                <th><?= MailsTable::__('start') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('start', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '開始',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= MailsTable::__('end') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('start', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '終了',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= MailsTable::__('user') ?></th>
                <td>
                    <?= $this->Form->control('user_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= MailsTable::__('student') ?></th>
                <td>
                    <?= $this->Form->control('student_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= MailsTable::__('assign') ?></th>
                <td>
                    <?= $this->Form->control('assign_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= MailsTable::__('process') ?></th>
                <td>
                    <?= $this->Form->control('process_id', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= MailsTable::__('created') ?></th>
                <td><?= h($mail->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= MailsTable::__('modified') ?></th>
                <td><?= h($mail->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
        </table>
        <div class="action-button">
            <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
                'class' => 'btn btn-success', 'escape' => false
            ]) ?>
            <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', $action = ['action' => 'view', $mail->id], [
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
