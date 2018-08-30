<?php echo $this->Html->css('users.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\SurveyMonkeyApiCountsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item active">SurveyMonkeyApi</li>
    </ol>
</section>
<section class="content">
    <?php if ($surveyMonkeyApiCounts): ?>
    <div class="card card-default">
        <table class="card-body table table-sm table-sortable table-linkable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', SurveyMonkeyApiCountsTable::__('id')) ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('date') ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('global_minute_limit') ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('global_minute_remaining') ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('global_minute_reset') ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('global_day_limit') ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('global_day_remaining') ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('global_day_reset') ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('created') ?></th>
                    <th><?= SurveyMonkeyApiCountsTable::__('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($surveyMonkeyApiCounts as $surveyMonkeyApiCount): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($surveyMonkeyApiCount->id) ?></td>
                    <td><?= h($surveyMonkeyApiCount->date->i18nFormat('yyyy年M月d日')) ?? '' ?></td>
                    <td><?= h($surveyMonkeyApiCount->global_minute_limit) ?? '' ?></td>
                    <td><?= h($surveyMonkeyApiCount->global_minute_remaining) ?? '' ?></td>
                    <td><?= h($surveyMonkeyApiCount->global_minute_reset).'分' ?? '' ?></td>
                    <td><?= h($surveyMonkeyApiCount->global_day_limit) ?? '' ?></td>
                    <td><?= h($surveyMonkeyApiCount->global_day_remaining) ?? '' ?></td>
                    <td><?= h($surveyMonkeyApiCount->global_day_reset) ?? '' ?></td>
                    <td><?= h($surveyMonkeyApiCount->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    <td><?= h($surveyMonkeyApiCount->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('pagination') ?>
    <?php endif ?>
</section>
