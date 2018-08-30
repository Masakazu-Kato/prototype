<?php echo $this->Html->css('applications.css', ['block' => 'css']) ?>
<?php use \App\Model\Table\UsersTable ?>
<section class="header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fas fa-cog"></i>設定管理</li>
        <li class="breadcrumb-item"><a href="/users">アカウント</a></li>
        <li class="breadcrumb-item active">詳細</li>
    </ol>
</section>
<div class="row">
    <div class="col-md-9">
        <section class="content sandbox">
            <div class="sheet">
                <table class="table table-bordered table-plane">
                    <tr>
                        <th><?= UsersTable::__('id') ?></th>
                        <td><?= $this->Number->format($user->id) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('name') ?></th>
                        <td><?= h(join(' ', array_filter([$user->lastname, $user->firstname]))) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('kana') ?></th>
                        <td><?= h(join(' ', array_filter([$user->lastname_kana, $user->firstname_kana]))) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('email') ?></th>
                        <td><?= h($user->email)  ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('phone') ?></th>
                        <td><?= h($user->phone)  ?? '' ?></td>
                    </tr>

                    <tr>
                        <th><?= UsersTable::__('postcode') ?></th>
                        <td><?= h($user->postcode) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('prefecture') ?></th>
                        <td><?= h($user->prefecture->name) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('municipality') ?></th>
                        <td><?= h($user->municipality) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('street') ?></th>
                        <td><?= h($user->street) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('building') ?></th>
                        <td><?= h($user->building) ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('birthday') ?></th>
                        <td><?= h($user->birthday->i18nFormat('yyyy年M月d日'))  ?? '' ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('enable') ?></th>
                        <td><?= h($enable[$user->enable] ?? '') ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('created') ?></th>
                        <td><?= h($user->created->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>
                    <tr>
                        <th><?= UsersTable::__('modified') ?></th>
                        <td><?= h($user->modified->i18nFormat('yyyy年M月d日 HH:mm:ss')) ?></td>
                    </tr>

                    <?php
                        // var_dump($user->mails);
                        // var_dump($user->notes);
                        // var_dump($user->short_messages);
                        // var_dump($user->tasks);
                    ?>

                </table>
                <div class="action-button">
                    <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>編集', ['action' => 'edit', $user->id], [
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
                <?php if ($user->mails): ?>
                <table class="table table-bordered table-plane">
                    <?php foreach ($user->mails as $key => $mail): ?>
                    <tr>
                        <th><?= $user->id ?></th>
                        <td><?= h($user->subject) ?? '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif ?>
            </div>
        </section>
    </div>
</div>
