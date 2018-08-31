<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('exams/add.js', ['block' => 'script']) ?>
<?php use \App\Model\Table\ExamsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-graduation-cap"></i>試験</li>
        <li class="breadcrumb-item"><a href="/exams/">一覧</a></li>
        <li class="breadcrumb-item active">追加</li>
    </ol>
</section>
<section class="content">
    <?= $this->Form->create($exam) ?>
    <table class="table table-bordered table-editable">
        <tr>
            <th><?= ExamsTable::__('name') ?></th>
            <td>
                <?= $this->Form->control('name', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => '名称',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('text') ?></th>
            <td>
                <?= $this->Form->control('text', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => '概略',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('survey') ?></th>
            <td>
                <?= $this->Form->control('survey_id', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'options' => $surveys,
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('exam_due') ?></th>
            <td>
                <?= $this->Form->control('exam_due', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('exam_start') ?></th>
            <td>
                <?= $this->Form->control('exam_start', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('exam_end') ?></th>
            <td>
                <?= $this->Form->control('exam_end', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('exam_minute') ?></th>
            <td>
                <?= $this->Form->control('exam_minute', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('email') ?></th>
            <td>
                <?= $this->Form->control('email', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => 'メールアドレス',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('phone') ?></th>
            <td>
                <?= $this->Form->control('phone', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => '電話番号',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('postcode') ?></th>
            <td>
                <?= $this->Form->control('postcode', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => '郵便番号',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('prefecture') ?></th>
            <td>
                <?= $this->Form->control('prefecture_id', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'options' => $prefectures,
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('municipality') ?></th>
            <td>
                <?= $this->Form->control('municipality', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => '市区町村',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('street') ?></th>
            <td>
                <?= $this->Form->control('street', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => '番地',
                ]) ?>
            </td>
        </tr>
        <tr>
            <th><?= ExamsTable::__('building') ?></th>
            <td>
                <?= $this->Form->control('building', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => '建物',
                ]) ?>
            </td>
        </tr>
    </table>
    <div class="action-button">
        <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
            'class' => 'btn btn-success', 'escape' => false
        ]) ?>
        <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', ['action' => 'index'], [
            'class' => ['btn', 'btn-dark'], 'escape' => false
        ]) ?>
    </div>
    <?= $this->Form->end() ?>
</section>
