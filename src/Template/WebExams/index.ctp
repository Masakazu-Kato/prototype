<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\ExamsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>試験</li>
        <li class="breadcrumb-item active">一覧</li>
    </ol>
</section>
<section class="content">
    <?php if ($exams): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ExamsTable::__('id')) ?></th>
                    <th><?= ExamsTable::__('name') ?></th>

                    <th><?= ExamsTable::__('exam_start') ?></th>
                    <th><?= ExamsTable::__('exam_end') ?></th>

                    <th><?= ExamsTable::__('exam_minute') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exams as $exam): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($exam->id) ?></td>
                    <td><?= h($exam->name) ?></td>
                    <td><?= h($exam->exam_start->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($exam->exam_end->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($exam->exam_minute).'分' ?? '' ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $exam->id ], ['escape' => false])
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
