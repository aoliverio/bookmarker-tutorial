<div class="panel panel-default">
    <div class="panel-heading">
        <span class="pull-right">
            <small><?= __('Actions:'); ?></small>
            <a class="btn btn-xs" href="<?= $this->Url->build(['controller' => 'bookmarks', 'action' => 'index']) ?>"><i class="fa fa-list"></i> <?= __('List') ?></a>
        </span>
        <h3 class="panel-title"><i class="fa fa-search-plus"></i> <?= __('Bookmark'); ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6 columns strings">
                <label class="subheader"><?= __('User') ?></label>
                <p><?= $bookmark->has('user') ? $this->Html->link($bookmark->user->id, ['controller' => 'Users', 'action' => 'view', $bookmark->user->id]) : '' ?></p>
                <label class="subheader"><?= __('Title') ?></label>
                <p><?= h($bookmark->title) ?></p>
                <hr/>
            </div>
            <div class="col-md-2 columns numbers end">
                <label class="subheader"><?= __('Id') ?></label>
                <p><?= $this->Number->format($bookmark->id) ?></p>
                <hr/>
            </div>
            <div class="col-md-2 columns dates end">
                <label class="subheader"><?= __('Created') ?></label>
                <p><?= h($bookmark->created) ?></p>
                <hr/>
                <label class="subheader"><?= __('Modified') ?></label>
                <p><?= h($bookmark->modified) ?></p>
                <hr/>
            </div>
        </div>
    </div>
</div>