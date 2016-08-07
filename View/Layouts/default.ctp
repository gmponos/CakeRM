<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset(); ?>
        <title>
            <?= configure::read('Site.brand'); ?>:
            <?= $title_for_layout; ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto&subset=latin,greek-ext,greek" type="text/css" rel="stylesheet">
        <?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>

        <?= $this->Html->meta('icon'); ?>
        <?= $this->Html->css('CakeBootstrap.bootstrap'); ?>
        <?= $this->Html->css('CakeBootstrap.bootstrap-custom'); ?>
        <?= $this->Html->css('CakeBootstrap.font-awesome'); ?>
        <?= $this->Html->css('CakeBootstrap.chosen'); ?>
        <?= $this->Html->css('CakeBootstrap.chosen-custom'); ?>
        <?= $this->Html->css('CakeBootstrap.datepicker'); ?>
        <?= $this->Html->css('CakeBootstrap.clockpicker'); ?>
        <?= $this->Html->css('CakeFullCalendar.fullcalendar'); ?>
        <?= $this->Html->css('CakeQtip.qtip.min'); ?>
        <?= $this->Html->css('style'); ?>
        <?= $this->Html->css('elements'); ?>
        <?= $this->Html->css('theme'); ?>

        <?= $this->fetch('meta'); ?>
        <?= $this->fetch('css'); ?>

        <?= $this->Html->script('CakeBootstrap.jquery', ['once' => true]); ?>
        <?= $this->Html->script('CakeBootstrap.bootstrap', ['once' => true]); ?>
        <?= $this->Html->script('CakeBootstrap.chosen', ['once' => true]); ?>
        <?= $this->Html->script('CakeBootstrap.datepicker', ['once' => true]); ?>
        <?= $this->Html->script('CakeBootstrap.clockpicker', ['once' => true]); ?>
        <?= $this->Html->script('CakeBootstrap.functions', ['once' => true]); ?>

        <?= $this->Html->script('core/jquery-ui', ['once' => true]); ?>
        <?= $this->Html->script('CakeQtip.qtip', ['once' => true]); ?>
        <?= $this->Html->script('CakeQtip.qtip.growl'); ?>

        <?= $this->Html->script('Calendar.fullcalendar', ['once' => true]); ?>

        <?= $this->Html->script('functions', ['once' => true]); ?>
        <?= $this->Html->script('forms', ['once' => true]); ?>

        <?= $this->fetch('script'); ?>
    </head>
    <body>
        <?= $this->element('navbar'); ?>
        <?= $this->element('sidebar'); ?>
        <div id="growl-messages"></div>
        <div id="main">
            <div class="container-fluid">
                <?= $this->element('breadcrumb'); ?>
                <?= $this->Flash->render(); ?>
                <div id="content">
                    <?= $this->fetch('content'); ?>
                </div>
                <?= $this->element('footer'); ?>
            </div>
        </div>
        <?= $this->element('modals/modal-remote'); ?>
    </body>
</html>
