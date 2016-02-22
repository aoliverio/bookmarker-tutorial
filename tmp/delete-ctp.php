<CakePHPBakeOpenTagphp $this->layout = null CakePHPBakeCloseTag>
<h4><CakePHPBakeOpenTag= __('Delete <?= $singularHumanName ?>'); CakePHPBakeCloseTag></h4>
<hr/>
<div>
    <CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>); CakePHPBakeCloseTag>
    <p><CakePHPBakeOpenTag= __('Are you sure you want to delete # {0}?', $<?= $singularVar ?>->id); CakePHPBakeCloseTag></p>
    <hr/>
    <div class="text-center">
        <button class="btn btn-danger" type="submit"><CakePHPBakeOpenTag= __('Confirm') CakePHPBakeCloseTag></button>  
    </div>
    <CakePHPBakeOpenTag= $this->Form->end(); CakePHPBakeCloseTag>
</div>