<?php $this->layout = null ?>
<h4><?= __('Add Bookmark'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($bookmark) ?>
    <?= $this->Form->input('user_id', ['options' => $users, 'label' => 'User Id', 'class' => 'form-control']); ?>
    <?= $this->Form->input('title', ['label' => 'Title', 'class' => 'form-control']); ?>
    <?= $this->Form->input('description', ['label' => 'Description', 'class' => 'form-control']); ?>
    <?= $this->Form->input('url', ['label' => 'Url', 'class' => 'form-control']); ?>
    <?= $this->Form->input('tags._ids', ['options' => $tags, 'class' => 'form-control']); ?>
    <hr/>
    <div class="text-center">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>  
    </div>
    <?= $this->Form->end() ?>
</div>