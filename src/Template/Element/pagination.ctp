<?php if ($this->Paginator->total() > 1): ?>
<div class="page-navigation">
    <nav>
        <ul class="pagination">
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>') ?>
        </ul>
    </nav>
</div>
<?php endif ?>