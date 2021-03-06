<?php
$_active = 'index';
$_action = $this->request->getParam('action');
$_name = strtolower($this->name);

switch ($_name) {
    case 'index':
    case 'home':
        $_active = 'index';
        break;
    case 'exams':
        $_active = 'exams';
        break;
    case 'surveys':
        $_active = 'surveys';
        break;
    case 'students':
        $_active = 'students';
        break;
    case 'mails':
        $_active = 'mails';
        break;
    case 'shortmessages':
        $_active = 'short-messages';
        break;
    case 'tasks':
        $_active = 'tasks';
        break;
    case 'notes':
        $_active = 'notes';
        break;
    case 'applicationerrors':
        $_active = 'application-errors';
        break;
    case 'shorturls':
        $_active = 'short-urls';
        break;
    default:
        $_active = 'settings';
        break;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('glyphicon.css') ?>
    <?= $this->Html->css('fontawesome-all.min.css') ?>
    <?= $this->Html->css('dashboard.css?' . time()) ?>
    <?= $this->Html->css('common.css?' . time()) ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery-3.3.1.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('common.js?' . time()) ?>
    <?= $this->fetch('script') ?>
</head>
<body data-vendor="">
    <header class="navbar navbar-expand navbar-dark bg-dark" role="navigation">
        <a class="navbar-brand" href="#">
            <i class="fas fa-hand-holding-heart"></i>
        </a>
        <a class="navbar-brand" href="#">Survey</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'index') echo ' active' ?>" href="/">
                    <i class="fas fa-home"></i>ホーム
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'exams') echo ' active' ?>" href="/exams/?sort=id&direction=desc">
                    <i class="fas fa-graduation-cap"></i>試験
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'surveys') echo ' active' ?>" href="/surveys/?sort=id&direction=desc">
                    <i class="fas fa-question-circle"></i>アンケート
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'students') echo ' active' ?>" href="/students/">
                    <i class="fas fa-user"></i>受講者
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'mails') echo ' active' ?>" href="/mails?sort=id&direction=desc">
                    <i class="fas fa-envelope"></i>メール
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'short-messages') echo ' active' ?>" href="/short-messages?sort=id&direction=desc">
                    <i class="fas fa-comment"></i>SMS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'tasks') echo ' active' ?>" href="/tasks?sort=id&direction=desc">
                    <i class="fas fa-tasks"></i>タスク
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'notes') echo ' active' ?>" href="/notes?sort=id&direction=desc">
                    <i class="far fa-sticky-note"></i>ノート
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'application-errors') echo ' active' ?>" href="/application-errors?sort=id&direction=desc">
                    <i class="fas fa-exclamation-triangle"></i>エラー
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php if ($_active === 'short-urls') echo ' active' ?>" href="/short-urls?sort=id&direction=desc">
                    <i class="fas fa-link"></i>短縮URL
                </a>
            </li>
            <li class="nav-item<?php if ($_active === 'settings') echo ' active' ?>">
                <a class="nav-link" href="/settings/users/">
                    <i class="fas fa-cog"></i>設定管理
                </a>
            </li>
        </ul>
        <ul class="navbar-nav mr-left">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/users/view"><?= $currentUser->full_name ?>さんのマイページ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/users/signout">ログアウト</a>
                </div>
            </li>
        </ul>
    </header>
    <div class="container-fluid">
        <div class="row">
            <?php if (isset($sidebarName)): ?>
            <div class="sidebar">
                <?= $this->element($sidebarName) ?>
            </div>
            <?php endif ?>
            <main role="main">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </main>
        </div>
    </div>
    <footer>
        <span>Copyright &copy; 2018 FP Partner Inc. All Rights Reserved.</span>
    </footer>
</body>
</html>
