<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\StudentsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-user"></i>受講者</li>
        <li class="breadcrumb-item"><a href="/students/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$student): ?>
    <?= $this->Form->create($student, ['name' => 'add', 'type' => 'post', 'url' => '/students/add/2']) ?>
    <?php endif ?>
</section>
<div class="row">
    <div class="col-md-9">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= StudentsTable::__('id') ?></th>
                        <td><?= h($student->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('name') ?></th>
                        <td><?= h($student->full_name) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('kana') ?></th>
                        <td><?= h($student->full_name_kana) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('email') ?></th>
                        <td><?= h($student->email) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('phone') ?></th>
                        <td><?= h($student->phone) ?? '' ?></td>
                    </tr>

                    <tr>
                        <th><?= StudentsTable::__('postcode') ?></th>
                        <td><?= h($student->postcode) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('prefecture') ?></th>
                        <td><?= h($student->prefecture->name) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('municipality') ?></th>
                        <td><?= h($student->municipality) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('street') ?></th>
                        <td><?= h($student->street) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('building') ?></th>
                        <td><?= h($student->building) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('birthday') ?></th>
                        <td><?= h($student->birthday->i18nFormat('yyyy年M月d日')) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('enable') ?></th>
                        <td><?= h($enable[$student->enable]) ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('created') ?></th>
                        <td><?= h($student->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= StudentsTable::__('modified') ?></th>
                        <td><?= h($student->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>

                    <?php
                        // var_dump($student->mails);
                        // var_dump($student->notes);
                        // var_dump($student->short_messages);
                        // var_dump($student->tasks);
                    ?>

                </table>
                <div class="action-button">
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $student->id], [
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
