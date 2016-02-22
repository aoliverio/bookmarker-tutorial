<CakePHPBakeOpenTagphp $this->layout = null CakePHPBakeCloseTag>
<h4><CakePHPBakeOpenTag= __('Filter <?= $singularHumanName ?>'); CakePHPBakeCloseTag></h4>
<hr/>
<div>
    <CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>); CakePHPBakeCloseTag>
<?php if (!empty($associations['BelongsToMany'])) { ?>
<?php foreach ($associations['BelongsToMany'] as $assocName => $assocData) { ?>
    <CakePHPBakeOpenTag= $this->Form->input('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>, 'class' => 'form-control']); CakePHPBakeCloseTag>
<?php } ?>
<?php } else { ?>
    <CakePHPBakeOpenTag= __('No filter template are builded. Make your filter here!'); CakePHPBakeCloseTag>
<?php } ?>
    <hr/>
    <div class="text-center">
        <button class="btn btn-success" type="submit"><CakePHPBakeOpenTag= __('Filter'); CakePHPBakeCloseTag></button>  
    </div>
    <CakePHPBakeOpenTag= $this->Form->end(); CakePHPBakeCloseTag>
</div>