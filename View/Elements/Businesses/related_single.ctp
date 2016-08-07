
<dl class="dl-table">
    <dt><?= __('Business'); ?></dt>
    <dd><?= $this->Html->link($business['fullname'], [
            'controller' => 'businesses',
            'admin' => true,
            'action' => 'view',
            $business['id'],
        ]); ?>&nbsp;</dd>
    <dt><?= __('Phones'); ?></dt>
    <dd><?= $business['phones']; ?>&nbsp;</dd>
    <dt><?= __('Email'); ?></dt>
    <dd><?= $business['email']; ?>&nbsp;</dd>
    <dt><?= __('website'); ?></dt>
    <dd><?= $business['website']; ?>&nbsp;</dd>
</dl>