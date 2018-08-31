<?php
$_active = 'index';
$_action = $this->request->getParam('action');
$_name = strtolower($this->name);

switch ($_name) {
    case 'index':
    case 'home':
        $_active = 'index';
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
        </ul>
        <ul class="navbar-nav mr-left">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="">マイページ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="">ログアウト</a>
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
