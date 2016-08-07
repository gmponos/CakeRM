<footer>
    <div class="container-fluid text-muted">
        <p class="text-center">
            <?= sprintf(__('Designed and Developed by %s'), configure::read('Site.developer')); ?>
        </p>

        <p class="text-center"><?= sprintf(__('Current Version %s'), configure::read('Site.version')); ?></p>
        <ul class="list-inline list-unstyled text-center">
            <li><?= $this->Html->link(__('Issues'), 'https://github.com/gmponos/CakeRM/issues',
                    ['target' => '_blank']); ?></li>
            <li><?= $this->Html->link(__('Contact'), 'mailto:gmponos@webthink.gr'); ?></li>
            <li><?= $this->Html->link(__('About'), '/about') ?></li>
        </ul>
        <?= $this->Html->link(
            $this->Html->image('cake.power.gif', ['border' => '0']), 'http://www.cakephp.org/',
            ['target' => '_blank', 'escape' => false]
        );
        ?>
    </div>
    <div class="container-fluid">
        <?= $this->element('sql_dump'); ?>
    </div>
</footer>