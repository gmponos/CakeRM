<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top-collapse">
        <span class="sr-only"><?= __('Toggle navigation'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <?= $this->Html->link(configure::read('Site.brand'), '/dashboard',
        ['class' => 'navbar-brand', 'icon' => ['class' => 'fa fa-bar-chart-o']]); ?>
</div>