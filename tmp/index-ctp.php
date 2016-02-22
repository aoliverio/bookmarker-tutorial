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

$fields = collection($fields)
->filter(function($field) use ($schema) {
return !in_array($schema->columnType($field), ['binary', 'text']);
})
->take(7);
?>
<CakePHPBakeOpenTag= $this->element('Builder.constructor/default-index-template'); CakePHPBakeCloseTag>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="pull-right">
            <small><CakePHPBakeOpenTag= __('Actions:'); CakePHPBakeCloseTag></small>
            <a class="btn btn-xs" href="<CakePHPBakeOpenTag= $this->Url->build(['controller' => '<?= Inflector::slug($pluralVar) ?>', 'action' => 'filter']) CakePHPBakeCloseTag>" data-toggle="modal" data-target="#myModal"><i class="fa fa-filter"></i> <CakePHPBakeOpenTag= __('Filter') CakePHPBakeCloseTag></a>
            <a class="btn btn-xs" href="<CakePHPBakeOpenTag= $this->Url->build(['controller' => '<?= Inflector::slug($pluralVar) ?>', 'action' => 'add']) CakePHPBakeCloseTag>" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> <CakePHPBakeOpenTag= __('Add') CakePHPBakeCloseTag></a>
        </span>
        <h3 class="panel-title"><i class="fa fa-list"></i> <CakePHPBakeOpenTag= __('List of <?= $singularHumanName ?>'); CakePHPBakeCloseTag></h3>
    </div>
    <div class="panel-body">
        <table id="<?= $singularVar ?>-table" class="table table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th class="check no-sorting">
                        <input id="checkall" class="" type="checkbox" name="" value="" />
                    </th>
<?php foreach ($fields as $field): ?>
                    <th><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></th>
<?php endforeach; ?>
                    <th class="actions no-sorting"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></th>
                </tr>
            </thead>
            <tbody>
                <CakePHPBakeOpenTagphp foreach ($data as $<?= $singularVar ?>): CakePHPBakeCloseTag>
                    <tr>
                        <td><input id="" class="check" type="checkbox" name="" value="" /></td>
<?php foreach ($fields as $field) {
$isKey = false;
if (!empty($associations['BelongsTo'])) {
foreach ($associations['BelongsTo'] as $alias => $details) {
if ($field === $details['foreignKey']) {
$isKey = true;
?>
                        <td><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></td>
<?php
break;
}
}
}
if ($isKey !== true) {
if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
?>
                        <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
} else {
?>
                        <td><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
}
}
}
$pk = '$' . $singularVar . '->' . $primaryKey[0];
?>
                        <td class="actions text-right">
                            <CakePHPBakeOpenTag= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => '<?= Inflector::slug($pluralVar) ?>', 'action' => 'view', <?= $pk ?>], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) CakePHPBakeCloseTag>
                            <CakePHPBakeOpenTag= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => '<?= Inflector::slug($pluralVar) ?>', 'action' => 'edit', <?= $pk ?>], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit'), 'data-toggle' => 'modal', 'data-target' => '#myModal']) CakePHPBakeCloseTag>
                            <CakePHPBakeOpenTag= $this->Html->link('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => '<?= Inflector::slug($pluralVar) ?>', 'action' => 'delete', <?= $pk ?>], ['escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete'), 'data-toggle' => 'modal', 'data-target' => '#myModal']) CakePHPBakeCloseTag>
                        </td>
                    </tr>
                <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
            </tbody>
        </table>
    </div>
</div>
