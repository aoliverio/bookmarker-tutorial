<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.1.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
use Cake\Utility\Inflector;

$fields = collection($fields)->filter(function($field) use ($schema) {
    return $schema->columnType($field) !== 'binary';
});
?>
<CakePHPBakeOpenTagphp $this->layout = null CakePHPBakeCloseTag>
<h4><CakePHPBakeOpenTag= __('<?= Inflector::humanize($action) ?> <?= $singularHumanName ?>'); CakePHPBakeCloseTag></h4>
<hr/>
<div>
    <CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>) CakePHPBakeCloseTag>
<?php foreach ($fields as $field) : ?>
<?php if (in_array($field, $primaryKey)) { ?>
<?php continue; ?>
<?php } ?>
<?php if (isset($keyFields[$field])) { ?>
<?php $fieldData = $schema->column($field); ?>
<?php if (!empty($fieldData['null'])) { ?>
    <CakePHPBakeOpenTag= $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'label' => '<?= Inflector::humanize($field) ?>', 'class' => 'form-control', 'empty' => true]); CakePHPBakeCloseTag>
<?php } else { ?>
    <CakePHPBakeOpenTag= $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'label' => '<?= Inflector::humanize($field) ?>', 'class' => 'form-control']); CakePHPBakeCloseTag>
<?php } ?>
<?php continue; ?>
<?php } ?>
<?php if (!in_array($field, ['created', 'modified', 'created_user', 'modified_user'])) { ?>
<?php $fieldData = $schema->column($field); ?>
<?php if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) { ?>
    <CakePHPBakeOpenTag= $this->Form->input('<?= $field ?>', ['label' => '<?= Inflector::humanize($field) ?>', 'empty' => true, 'default' => '']); CakePHPBakeCloseTag>
        <?php } else { ?>
    <CakePHPBakeOpenTag= $this->Form->input('<?= $field ?>', ['label' => '<?= Inflector::humanize($field) ?>', 'class' => 'form-control']); CakePHPBakeCloseTag>
<?php } ?>
<?php } ?>
<?php endforeach; ?>
<?php if (!empty($associations['BelongsToMany'])) { ?>
<?php foreach ($associations['BelongsToMany'] as $assocName => $assocData) : ?>
    <CakePHPBakeOpenTag= $this->Form->input('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>, 'class' => 'form-control']); CakePHPBakeCloseTag>
<?php endforeach; ?>
<?php } ?>
    <hr/>
    <div class="text-center">
        <CakePHPBakeOpenTag= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) CakePHPBakeCloseTag>  
    </div>
    <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
</div>