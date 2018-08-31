<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('students/edit.js', ['block' => 'script']) ?>
<?php use \App\Model\Table\StudentsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-user"></i>受講者</li>
        <li class="breadcrumb-item"><a href="/students/">一覧</a></li>
        <li class="breadcrumb-item active">編集</li>
    </ol>
</section>
<section class="content sandbox">
    <div class="sheet">
        <?= $this->Form->create($student) ?>
        <table class="table table-bordered table-editable">
            <tr>
                <th><?= StudentsTable::__('id') ?></th>
                <td><?= $this->Number->format($student->id) ?></td>
            </tr>
            <tr>
                <th><?= StudentsTable::__('name') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('firstname', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '名',
                        ]) ?>
                        <?= $this->Form->control('lastname', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => '名',
                        ]) ?>
                    </div>
                </td>
            </tr>

            <tr>
                <th><?= StudentsTable::__('kana') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('firstname_kana', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'セイ',
                        ]) ?>
                        <?= $this->Form->control('lastname_kana', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'メイ',
                        ]) ?>
                    </div>
                </td>
            </tr>

            <tr>
                <th><?= StudentsTable::__('email') ?></th>
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
                <th><?= StudentsTable::__('phone') ?></th>
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
                <th><?= StudentsTable::__('postcode') ?></th>
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
                <th><?= StudentsTable::__('prefecture') ?></th>
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
                <th><?= StudentsTable::__('municipality') ?></th>
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
                <th><?= StudentsTable::__('street') ?></th>
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
                <th><?= StudentsTable::__('building') ?></th>
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
                <th><?= StudentsTable::__('birthday') ?></th>
                <td>
                    <div class="input-group">
                        <?= $this->Form->control('birthday', [
                            'templates' => ['inputContainer' => '{{content}}'],
                            'label' => false,
                            'class' => 'form-control',
                        ]) ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th><?= StudentsTable::__('enable') ?></th>
                <td>
                    <?= $this->Form->control('enable', [
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class' => 'form-control',
                        'options' => $enable
                    ]) ?>
                </td>
            </tr>
            <tr>
                <th><?= StudentsTable::__('created') ?></th>
                <td><?= h($student->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
            <tr>
                <th><?= StudentsTable::__('modified') ?></th>
                <td><?= h($student->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
            </tr>
        </table>
        <div class="action-button">
            <?= $this->Form->button('<i class="glyphicon glyphicon-save"></i>保存', [
                'class' => 'btn btn-success', 'escape' => false
            ]) ?>
            <?= $this->Html->link('<i class="fas fa-ban"></i>キャンセル', $action = ['action' => 'view', $student->id], [
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
