<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('exams/edit.js?' . time(), ['block' => 'script']) ?>
<?php use \App\Model\Table\ExamsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item"><a href="/mails/">メール</a></li>
        <li class="breadcrumb-item active">編集</li>
    </ol>
</section>
<section class="content sandbox">
    <div class="sheet">
        <?= $this->Form->create($exam) ?>
        <table class="table table-bordered table-editable">
            <tr>
                <th><?= ExamsTable::__('id') ?></th>
                <td><?= $this->Number->format($exam->id) ?></td>
            </tr>

            <tr>
                <th><?= ExamsTable::__('name') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('name', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '名称',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('text') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('text', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '概略',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('survey') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('survey_id', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'options' => $surveys,
                        ]) ?>
                    </div>
                </td>
            </tr>

            <tr>
                <th><?= ExamsTable::__('exam_due') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('exam_due', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('exam_start') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('exam_start', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('exam_end') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('exam_end', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('exam_minute') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('exam_minute', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                        ]) ?>
                    </div>
                </td>
            </tr>


            <tr>
                <th><?= ExamsTable::__('email') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('email', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'メールアドレス',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('phone') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('phone', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '電話番号',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('postcode') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('postcode', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '郵便番号',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('prefecture') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('prefecture_id', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'options' => $prefectures,
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('municipality') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('municipality', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '市区町村',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('street') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('street', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '番地',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= ExamsTable::__('building') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('building', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '建物',
                        ]) ?>
                    </div>
                </td>
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
            <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
                'class' => 'btn btn-success', 'escape' => false
            ]) ?>
            <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', $action = ['action' => 'view', $exam->id], [
                'class' => ['btn', 'btn-dark'], 'escape' => false
            ]) ?>
            <?= $this->Form->button('<i class="glyphicon glyphicon-trash"></i>削除', [
                'class' => 'btn btn-danger',
                'name' => 'delete',
                'type' => 'button',
                'escape' => false
            ]) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
