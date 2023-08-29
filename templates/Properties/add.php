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
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties form content">
            <?= $this->Form->create($property) ?>
            <fieldset>
                <legend><?= __('Add Property') ?></legend>
                <?php
                    // echo $this->Form->control('id');
                    echo $this->Form->control('mls');
                    echo $this->Form->control('address');
                    echo $this->Form->control('beds');
                    echo $this->Form->control('baths');
                    echo $this->Form->control('sq_ft');
                    echo $this->Form->control('price');
                    echo $this->Form->control('date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
