<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Signin</title>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('signin.css') ?>
    <?= $this->Html->script('jquery-3.3.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
</head>
<body>
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->Form->create(null, [
            'class' => ['form-signin']
        ]) ?>
        <h2 class="form-signin-heading">Survey</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <?= $this->Form->control('email', [
            'templates' => ['inputContainer' => '{{content}}'],
            'label' => false,
            'class' => [ 'form-control', 'test' ],
            'placeholder' => 'Email address',
        ]) ?>
        <label for="inputPassword" class="sr-only">Password</label>
        <?= $this->Form->control('password', [
            'templates' => ['inputContainer' => '{{content}}'],
            'label' => false,
            'class' => [ 'form-control', 'test' ],
            'placeholder' => 'Password',
        ]) ?>
        <?= $this->Form->button('ログイン', [
            'class' => ['btn', 'btn-lg', 'btn-primary', 'btn-block'],
            'type' => 'submit',
            ''
        ]) ?>
        <?= $this->Form->end() ?>
    </div>
</body>
</html>
