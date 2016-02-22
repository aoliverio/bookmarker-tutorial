<?php $this->layout = null ?>
<h4><?= __('Filter Bookmark'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($bookmark); ?>
    <?= $this->Form->input('tags._ids', ['options' => $tags, 'class' => 'form-control']); ?>
    <hr/>
    <div class="text-center">
        <button class="btn btn-success" type="submit"><?= __('Filter'); ?></button>  
    </div>
    <?= $this->Form->end(); ?>
</div>