<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php echo $this->Html->script('web_exams/app.js?'. time(), ['block' => 'script']) ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>試験</li>
        <li class="breadcrumb-item active">試験開始</li>
    </ol>
</section>
<section class="content">
   app<br>
   ブラウザバッグや他遷移を一切できなくすること。<br>
   またJSは圧縮して解析ができないようにすること。
</section>

<?= $this->Form->create(NULL, ['type' => 'POST']); ?>

<?= $this->Form->hidden('keycode',['value'=> 'aaaaa' ]) ?>
<?= $this->Form->hidden('exam_id',['value'=> 1 ]) ?>

<?= $this->Form->end() ?>