<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\NotesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="far fa-sticky-note"></i>ノート</li>
        <li class="breadcrumb-item"><a href="/notes/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$note): ?>
    <?= $this->Form->create($note, ['name' => 'add', 'type' => 'post', 'url' => '/notes/add/2']) ?>
    <?= $this->Form->control('segment_id', ['id' => false, 'type' => 'hidden', 'value' => 1]) ?>
    <?= $this->Form->control('customer_id', ['id' => false, 'type' => 'hidden', 'value' => $note->id]) ?>
    <?php endif ?>
</section>
<div class="row">
    <div class="col-md-9">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= NotesTable::__('id') ?></th>
                        <td><?= h($note->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= NotesTable::__('name') ?></th>
                        <td><?= h($note->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= NotesTable::__('text') ?></th>
                        <td><?= h($note->text) ?></td>
                    </tr>
                    <tr>
                        <th><?= NotesTable::__('user') ?></th>
                        <td><?= h($note->user['full_name']) ?></td>
                    </tr>
                    <tr>
                        <th><?= NotesTable::__('student') ?></th>
                        <td><?= h($note->student['full_name']) ?></td>
                    </tr>
                    <tr>
                        <th><?= NotesTable::__('created') ?></th>
                        <td><?= h($note->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= NotesTable::__('modified') ?></th>
                        <td><?= h($note->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                </table>
                <div class="action-button">
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $note->id], [
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
