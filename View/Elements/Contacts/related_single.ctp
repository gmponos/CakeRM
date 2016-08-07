<dl class="dl-table">
    <dt><?= __('Fullname'); ?></dt>
    <dd><?= $this->Html->link($contact['fullname'], [
            'controller' => 'contacts',
            'action' => 'view',
            'admin' => true,
            $contact['id'],
        ]); ?>&nbsp;</dd>
    <dt><?= __('Phones'); ?></dt>
    <dd><?= $contact['phones']; ?>&nbsp;</dd>
    <dt><?= __('Email'); ?></dt>
    <dd><?= $contact['email']; ?>&nbsp;</dd>
</dl>