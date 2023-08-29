<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->MLS], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->MLS], ['confirm' => __('Are you sure you want to delete # {0}?', $property->MLS), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties view content">
            <h3><?= h($property->MLS) ?></h3>
            <table>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($property->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($property->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mls') ?></th>
                    <td><?= $this->Number->format($property->mls) ?></td>
                </tr>
                <tr>
                    <th><?= __('Beds') ?></th>
                    <td><?= $this->Number->format($property->beds) ?></td>
                </tr>
                <tr>
                    <th><?= __('Baths') ?></th>
                    <td><?= $this->Number->format($property->baths) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sq Ft') ?></th>
                    <td><?= $this->Number->format($property->sq_ft) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($property->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($property->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
