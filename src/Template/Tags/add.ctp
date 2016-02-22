<?php $this->layout = null ?>
<h4><?= __('Add Tag'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($tag) ?>
    <?= $this->Form->input('title', ['label' => 'Title', 'class' => 'form-control']); ?>
    <?= $this->Form->input('bookmarks._ids', ['options' => $bookmarks, 'class' => 'form-control']); ?>
    <hr/>
    <div class="text-center">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>  
    </div>
    <?= $this->Form->end() ?>
</div>