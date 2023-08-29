<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav content">
            <!-- <h4 class="heading"><?= __('Search') ?></h4> -->
            <?= $this->Form->create(null, ['type' => 'get']) ?>
            <?= $this->Form->control('mls', ['label' => 'MLS#', 'value' => $this->request->getQuery('mls')]) ?>
            <?= $this->Form->control('address', ['label' => 'Address', 'value' => $this->request->getQuery('address')]) ?>
            <?= $this->Form->submit('Search') ?>
            <?= $this->Form->end() ?>

            <!-- <?= $fruits = ['1' => 'orange', '2' => 'melon', '3' => 'lemon', '4' => 'apple'];
            echo $this->Form->control('Fruit', ['options' => $fruits, 'label' => "select your fruit", 'value' => 'lemon'], ['class' => 'button float-left']);
            ?> -->
        </div>
    </aside>
    <div class="column-responsive column-80">

        <div class="properties index content">
            <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'button float-right']) ?>
            <h3>
                <?= __('Properties') ?>
            </h3>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <!-- <?= $this->Paginator->sort('id') ?> -->
                            </th>
                            <th>
                                <?= $this->Paginator->sort('mls') ?>
                            </th>
                            <th>
                                <?= $this->Paginator->sort('address') ?>
                            </th>
                            <th>
                                <?= $this->Paginator->sort('beds') ?>
                            </th>
                            <th>
                                <?= $this->Paginator->sort('baths') ?>
                            </th>
                            <th>
                                <?= $this->Paginator->sort('sq_ft') ?>
                            </th>
                            <th>
                                <?= $this->Paginator->sort('price') ?>
                            </th>
                            <th>
                                <?= $this->Paginator->sort('date') ?>
                            </th>
                            <th class="actions">
                                <?= __('Actions') ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($properties as $property): ?>
                            <tr>
                                <td>
                                    <!-- <?= $this->Number->format($property->id) ?> -->
                                </td>
                                <td>
                                    <?= $this->Number->format($property->mls) ?>
                                </td>
                                <td>
                                    <?= h($property->address) ?>
                                </td>
                                <td>
                                    <?= $this->Number->format($property->beds) ?>
                                </td>
                                <td>
                                    <?= $this->Number->format($property->baths) ?>
                                </td>
                                <td>
                                    <?= $this->Number->format($property->sq_ft) ?>
                                </td>
                                <td>
                                    <?= $this->Number->currency($property->price) ?>
                                </td>
                                <td>
                                    <?= h($property->date) ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->MLS)]) ?>
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
                <p>
                    <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
                </p>
            </div>
        </div>