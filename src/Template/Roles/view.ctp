<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use App\Model\Table\RolesTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>役割</li>
        <li class="breadcrumb-item"><a href="/roles/index?page=">一覧</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
    <?php if(!$role): ?>
    <?= $this->Form->create($role, ['name' => 'add', 'type' => 'post', 'url' => '/roles/add/2']) ?>
    <?= $this->Form->control('segment_id', ['id' => false, 'type' => 'hidden', 'value' => 1]) ?>
    <?= $this->Form->control('customer_id', ['id' => false, 'type' => 'hidden', 'value' => $role->id]) ?>
    <?php endif ?>
</section>
<div class="row">
    <div class="col-md-8">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= RolesTable::__('id') ?></th>
                        <td><?= h($role->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= RolesTable::__('name') ?></th>
                        <td><?= h($role->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= RolesTable::__('enable') ?></th>
                        <td><?= h($enable[$role->enable]) ?></td>
                    </tr>
                    <tr>
                        <th><?= RolesTable::__('created') ?></th>
                        <td><?= h($role->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= RolesTable::__('modified') ?></th>
                        <td><?= h($role->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <?php
                        // var_dump($role->users);
                    ?>
                </table>
                <div class="action-button">
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $role->id], [
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
    <div class="col-md-4">
        <section class="content sandbox">
            <div class="sheet">
            </div>
        </section>
    </div>
</div>
