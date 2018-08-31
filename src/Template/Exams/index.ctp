<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\ExamsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-graduation-cap"></i>試験</li>
    </ol>
    <a href="/exams/add" class="btn btn-primary btn-sm">
        <i class="glyphicon glyphicon-plus"></i>追加
    </a>
</section>
<section class="content">
    <?php if ($exams): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ExamsTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('name', ExamsTable::__('name')) ?></th>
                    <th><?= $this->Paginator->sort('survey', ExamsTable::__('survey')) ?></th>
                    <th><?= $this->Paginator->sort('exam_due', ExamsTable::__('exam_due')) ?></th>
                    <th><?= $this->Paginator->sort('exam_start', ExamsTable::__('exam_start')) ?></th>
                    <th><?= $this->Paginator->sort('exam_end', ExamsTable::__('exam_end')) ?></th>
                    <th><?= $this->Paginator->sort('exam_minute', ExamsTable::__('exam_minute')) ?></th>
                    <th><?= $this->Paginator->sort('created', ExamsTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', ExamsTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exams as $exam): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($exam->id) ?></td>
                    <td><?= h($exam->name) ?></td>
                    <td><?= h($exam->survey['title']) ?? '' ?></td>
                    <td><?= h($exam->exam_due->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($exam->exam_start->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($exam->exam_end->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($exam->exam_minute).'分' ?? '' ?></td>
                    <td><?= h($exam->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($exam->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
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
