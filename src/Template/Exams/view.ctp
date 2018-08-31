<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\ExamsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-graduation-cap"></i>試験</li>
        <li class="breadcrumb-item"><a href="/exams/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$exam): ?>
    <?= $this->Form->create($exam, ['name' => 'add', 'type' => 'post', 'url' => '/exams/add/2']) ?>
    <?php endif ?>
</section>
<div class="row">
    <div class="col-md-8">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= ExamsTable::__('id') ?></th>
                        <td><?= h($exam->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('name') ?></th>
                        <td><?= h($exam->name) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('text') ?></th>
                        <td><?= h($exam->text) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('survey') ?></th>
                        <td><?= h($exam->survey['title']) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('exam_due') ?></th>
                        <td><?= h($exam->exam_due->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('exam_start') ?></th>
                        <td><?= h($exam->exam_start->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('exam_end') ?></th>
                        <td><?= h($exam->exam_end->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('exam_minute') ?></th>
                        <td><?= h($exam->exam_minute).'分' ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('number') ?></th>
                        <td><?= h($exam->number).'人' ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('email') ?></th>
                        <td><?= h($exam->email) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('phone') ?></th>
                        <td><?= h($exam->phone) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('postcode') ?></th>
                        <td><?= h($exam->postcode) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('prefecture') ?></th>
                        <td><?= h($exam->prefecture->name) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('municipality') ?></th>
                        <td><?= h($exam->municipality) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('street') ?></th>
                        <td><?= h($exam->street) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('building') ?></th>
                        <td><?= h($exam->building) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('created') ?></th>
                        <td><?= h($exam->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= ExamsTable::__('modified') ?></th>
                        <td><?= h($exam->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>

                    <?php
                        // var_dump($exam->mails);
                        // var_dump($exam->notes);
                        // var_dump($exam->short_messages);
                        // var_dump($exam->tasks);
                    ?>

                </table>
                <div class="action-button">
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $exam->id], [
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
    <div class="col-md-4">
        <section class="content sandbox">
            <div class="sheet">
                <?php if ($exam->survey): ?>
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= $exam->survey['id'] ?></th>
                        <td><?= h($exam->survey['title']) ?? '' ?></td>
                    </tr>
                </table>
                <?php endif ?>
            </div>
        </section>
    </div>
</div>
