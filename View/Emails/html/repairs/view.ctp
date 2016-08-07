<div class="row">
    <div class="col-sm-9">
        <div class="well">
            <h5><?= __('Description'); ?></h5>
            <?= $this->Text->autoParagraph($repair['Repair']['description']); ?>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h4><?= __('Business'); ?></h4>
                <dl class="dl-auto">
                    <dt><?= __('Business'); ?></dt>
                    <dd><?= $this->Html->link($repair['Business']['business'],
                            ['controller' => 'businesses', 'action' => 'view', $repair['Business']['id']]); ?>
                        &nbsp;</dd>
                    <dt><?= __('Firm'); ?></dt>
                    <dd><?= $this->Html->link($repair['Business']['firm'],
                            ['controller' => 'businesses', 'action' => 'view', $repair['Business']['id']]); ?>
                        &nbsp;</dd>
                    <dt><?= __('Phones'); ?></dt>
                    <dd><?= $repair['Business']['phones']; ?>&nbsp;</dd>
                    <dt><?= __('Email'); ?></dt>
                    <dd><?= $repair['Business']['email']; ?>&nbsp;</dd>
                    <dt><?= __('Website'); ?></dt>
                    <dd><?= $repair['Business']['website']; ?>&nbsp;</dd>
                </dl>
            </div>
            <div class="col-sm-6">
                <h4><?= __('Contact'); ?></h4>
                <dl class="dl-auto">
                    <dt><?= __('Contact'); ?></dt>
                    <dd><?= $this->Html->link($repair['Contact']['fullname'],
                            ['controller' => 'contacts', 'action' => 'view', $repair['Contact']['id']]); ?>
                        &nbsp;</dd>
                    <dt><?= __('Phones'); ?></dt>
                    <dd><?= $repair['Contact']['phones']; ?>&nbsp;</dd>
                    <dt><?= __('Email'); ?></dt>
                    <dd><?= $repair['Contact']['email']; ?>&nbsp;</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h5><?= __('Details'); ?></h5>
            <dl class="dl-auto">
                <dt><?= __('Received'); ?></dt>
                <dd>
                    <time><?= h($repair['Repair']['date_received']); ?></time>
                    &nbsp;
                </dd>
                <dt><?= __('Repaired From'); ?></dt>
                <dd><?= $this->Html->link($repair['RepairedUser']['fullname'], [
                        'controller' => 'users',
                        'action' => 'view',
                        $repair['RepairedUser']['id'],
                    ]); ?>&nbsp;
                </dd>
                <dt><?= __('Repaired'); ?></dt>
                <dd>
                    <time><?= h($repair['Repair']['date_repaired']); ?></time>
                    &nbsp;</dd>
                <dt><?= __('Sented'); ?></dt>
                <dd>
                    <time><?= h($repair['Repair']['date_sented']); ?></time>
                    &nbsp;
                </dd>
                <dt><?= __('Created'); ?></dt>
                <dd>
                    <time><?= h($repair['Repair']['date_created']); ?></time>
                    &nbsp;
                </dd>
            </dl>
        </div>
    </div>
</div>
