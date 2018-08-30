<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\MailsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-envelope"></i>メール</li>
        <li class="breadcrumb-item"><a href="/mails/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$mail): ?>
    <?= $this->Form->create($mail, ['name' => 'add', 'type' => 'post', 'url' => '/mails/add/2']) ?>
    <?= $this->Form->control('segment_id', ['id' => false, 'type' => 'hidden', 'value' => 1]) ?>
    <?= $this->Form->control('customer_id', ['id' => false, 'type' => 'hidden', 'value' => $mail->id]) ?>
    <?php endif ?>
</section>
<div class="row">
    <div class="col-md-9">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= MailsTable::__('id') ?></th>
                        <td><?= h($mail->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('student') ?></th>
                        <td><?= h($mail->student['full_name']) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('subject') ?></th>
                        <td><?= h($mail->subject) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('mail_type') ?></th>
                        <td><?= h($mail->mail_type['name']) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('from') ?></th>
                        <td><?= h($mail->from) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('to') ?></th>
                        <td><?= h($mail->to) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('cc') ?></th>
                        <td><?= h($mail->cc) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('bcc') ?></th>
                        <td><?= h($mail->bcc) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('body') ?></th>
                        <td><?= h($mail->body)?? '' ?></td>
                    </tr>

                    <tr>
                        <th><?= MailsTable::__('raw') ?></th>
                        <td><?= h($mail->raw) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('status') ?></th>
                        <td><?= h($mail->status) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('mail_template') ?></th>
                        <td><?= h($mail->mail_template['name']) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('error_code') ?></th>
                        <td><?= h($mail->error_code) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= MailsTable::__('enable') ?></th>
                        <td><?= h($enable[$mail->enable]) ?></td>
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
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $mail->id], [
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
                <?php if ($mail->student): ?>
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= $mail->student['id'] ?></th>
                        <td><?= h($mail->student['full_name']) ?? '' ?></td>
                    </tr>
                </table>
                <?php endif ?>
                <?php if ($mail->mail_template): ?>
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= $mail->mail_template['id'] ?></th>
                        <td><?= h($mail->mail_template['name']) ?? '' ?></td>
                    </tr>
                </table>
                <?php endif ?>
            </div>
        </section>
    </div>
</div>
