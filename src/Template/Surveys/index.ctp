<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('surveys/app.js', ['block' => 'script']) ?>
<?php use \App\Model\Table\SurveysTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-question-circle"></i>アンケート</li>
    </ol>
    <button class="btn btn-success btn-sm">
        <i class="glyphicon glyphicon-plus"></i>リスト更新
    </button>
</section>
<section class="content">
    <?php if ($surveys): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', SurveysTable::__('id')) ?></th>
                    <th><?= $this->Paginator->sort('title', SurveysTable::__('title')) ?></th>
                    <th><?= $this->Paginator->sort('page_count', SurveysTable::__('page_count')) ?></th>
                    <th><?= $this->Paginator->sort('question_count', SurveysTable::__('question_count')) ?></th>
                    <th><?= $this->Paginator->sort('response_count', SurveysTable::__('response_count')) ?></th>
                    <th><?= $this->Paginator->sort('created', SurveysTable::__('created')) ?></th>
                    <th><?= $this->Paginator->sort('modified', SurveysTable::__('modified')) ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($surveys as $survey): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($survey->id) ?></td>
                    <td><?= h($survey->title) ?></td>
                    <td><?= h($survey->page_count) ?></td>
                    <td><?= h($survey->question_count) ?></td>
                    <td><?= h($survey->response_count) ?></td>
                    <td><?= h($survey->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($survey->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td class="action">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-chevron-right"></span>',
                            [ 'action' => 'view', $survey->id ], ['escape' => false])
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
