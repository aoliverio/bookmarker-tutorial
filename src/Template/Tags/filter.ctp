<?php $this->layout = null ?>
<h4><?= __('Filter Tag'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($tag); ?>
    <?= $this->Form->input('bookmarks._ids', ['options' => $bookmarks, 'class' => 'form-control']); ?>
    <hr/>
    <div class="text-center">
        <button class="btn btn-success" type="submit"><?= __('Filter'); ?></button>  
    </div>
    <?= $this->Form->end(); ?>
</div>