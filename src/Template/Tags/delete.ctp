<?php $this->layout = null ?>
<h4><?= __('Delete Tag'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($tag); ?>
    <p><?= __('Are you sure you want to delete # {0}?', $tag->id); ?></p>
    <hr/>
    <div class="text-center">
        <button class="btn btn-danger" type="submit"><?= __('Confirm') ?></button>  
    </div>
    <?= $this->Form->end(); ?>
</div>