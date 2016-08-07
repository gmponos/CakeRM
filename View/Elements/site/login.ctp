<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar-top">
    <div class="container">
        <?= $this->element('site/logo'); ?>
        <ul class="nav navbar-nav navbar-right">
            <li><?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']); ?></li>
            <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']); ?></li>
        </ul>
    </div>
</nav>
