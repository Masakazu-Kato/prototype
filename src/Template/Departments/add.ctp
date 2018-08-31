<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('departments/add.js', ['block' => 'script']) ?>
<?php use \App\Model\Table\DepartmentsTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item"><a href="/departments/">部門</a></li>
        <li class="breadcrumb-item active">追加</li>
    </ol>
</section>
<section class="content">
    <?= $this->Form->create($department) ?>
    <table class="table table-bordered table-editable">
        <tr>
            <th><?= DepartmentsTable::__('name') ?></th>
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
            <th><?= DepartmentsTable::__('enable') ?></th>
            <td>
                <?= $this->Form->control('enable', [
                    'templates' => ['inputContainer' => '{{content}}'],
                    'label' => false,
                    'class' => 'form-control',
                    'options' => $enable
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