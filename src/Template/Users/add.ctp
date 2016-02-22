<?php $this->layout = null ?>
<h4><?= __('Add User'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($user) ?>
    <?= $this->Form->input('email', ['label' => 'Email', 'class' => 'form-control']); ?>
    <?= $this->Form->input('password', ['label' => 'Password', 'class' => 'form-control']); ?>
    <hr/>
    <div class="text-center">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>  
    </div>
    <?= $this->Form->end() ?>
</div>