<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\MailsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-envelope"></i>メール</li>
    </ol>
    <a href="/mails/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($mails): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', MailsTable::__('id')) ?></th>
                    <th><?= MailsTable::__('student') ?></th>
                    <th><?= $this->Paginator->sort('subject', MailsTable::__('subject')) ?></th>
                    <th><?= $this->Paginator->sort('type', MailsTable::__('type')) ?></th>
                    <th><?= $this->Paginator->sort('to', MailsTable::__('to')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mails as $mail): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($mail->id) ?></td>
                    <td><?= h($mail->student['full_name']) ?></td>
                    <td><?= h($mail->subject) ?></td>
                    <td><?= h($mail->type) ?></td>
                    <td><?= h($mail->to) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $mail->id ], ['escape' => false])
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
