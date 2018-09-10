<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\ExamsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>試験</li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
</section>
<section class="content sandbox">
    <div class="sheet">
        <table class="table table-bordered table-plane">
            <tr>
                <th><?= ExamsTable::__('id') ?></th>
                <td><?= h($exam->id) ?></td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('name') ?></th>
                <td><?= h($exam->name) ?></td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('text') ?></th>
                <td><?= h($exam->text) ?></td>
            </tr>

            <tr>
                <th><?= ExamsTable::__('exam_due') ?></th>
                <td><?= h($exam->exam_due->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('exam_start') ?></th>
                <td><?= h($exam->exam_start->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('exam_end') ?></th>
                <td><?= h($exam->exam_end->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>

            <tr>
                <th><?= ExamsTable::__('exam_minute') ?></th>
                <td><?= h($exam->exam_minute).'分' ?? '' ?></td>
            </tr>

            <tr>
                <th><?= ExamsTable::__('prefecture') ?></th>
                <td><?= h($exam->prefecture['name']) ?? '' ?></td>
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
        </table>
        <div class="action-button">
            <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>開始', ['action' => 'app', $exam->id], [
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