<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 */
?>
<div class="properties index content">
    <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Properties') ?></h3>

    <?= $this->Form->create(null,['type'=>'get']) ?>
    <?= $this->Form->control('key', ['label'=>'Search By MLS#', 'value'=>$this->request->getQuery('key')]) ?>
    <?= $this->Form->submit('Search') ?>
    <?= $this->Form->end() ?>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('mls') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('beds') ?></th>
                    <th><?= $this->Paginator->sort('baths') ?></th>
                    <th><?= $this->Paginator->sort('sq_ft') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $property): ?>
                <tr>
                    <td><?= $this->Number->format($property->id) ?></td>
                    <td><?= $this->Number->format($property->mls) ?></td>
                    <td><?= h($property->address) ?></td>
                    <td><?= $this->Number->format($property->beds) ?></td>
                    <td><?= $this->Number->format($property->baths) ?></td>
                    <td><?= $this->Number->format($property->sq_ft) ?></td>
                    <td><?= $this->Number->currency($property->price) ?></td>
                    <td><?= h($property->date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $property->MLS]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->MLS]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->MLS], ['confirm' => __('Are you sure you want to delete # {0}?', $property->MLS)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
