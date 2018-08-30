<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\SurveysTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-question-circle"></i>アンケート</li>
        <li class="breadcrumb-item"><a href="/surveys/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$survey): ?>
    <?= $this->Form->create($survey, ['name' => 'add', 'type' => 'post', 'url' => '/students/add/2']) ?>
    <?php endif ?>
</section>
<section class="content sandbox">
    <div class="sheet">
        <table class="table table-bordered table-plane">
            <tr>
                <th><?= SurveysTable::__('id') ?></th>
                <td><?= h($survey->id) ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('title') ?></th>
                <td><?= h($survey->title) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('href') ?></th>
                <td><?= h($survey->href) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('page_count') ?></th>
                <td><?= h($survey->page_count) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('question_count') ?></th>
                <td><?= h($survey->question_count) ?? '' ?></td>
            </tr>

            <tr>
                <th><?= SurveysTable::__('response_count') ?></th>
                <td><?= h($survey->response_count) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('collect_url') ?></th>
                <td><?= h($survey->collect_url) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('preview') ?></th>
                <td><?= h($survey->preview) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('edit_url') ?></th>
                <td><?= h($survey->edit_url) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('analyze_url') ?></th>
                <td><?= h($survey->analyze_url) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('summary_url') ?></th>
                <td><?= h($survey->summary_url) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('is_owner') ?></th>
                <td><?= h($survey->is_owner) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('footer') ?></th>
                <td><?= h($survey->is_owner) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('buttons_text') ?></th>
                <td><?= h($survey->buttons_text) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('folder_id') ?></th>
                <td><?= h($survey->folder_id) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('language') ?></th>
                <td><?= h($survey->language) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('custom_valiables') ?></th>
                <td><?= h($survey->custom_valiables) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('category') ?></th>
                <td><?= h($survey->category) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('nickname') ?></th>
                <td><?= h($survey->nickname) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('origin_id') ?></th>
                <td><?= h($survey->origin_id) ?? '' ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('created') ?></th>
                <td><?= h($survey->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= SurveysTable::__('modified') ?></th>
                <td><?= h($survey->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
        </table>
        <div class="action-button">
            <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $survey->id], [
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
