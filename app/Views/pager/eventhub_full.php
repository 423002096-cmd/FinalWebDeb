<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<?php if ($pager->getPageCount() > 1): ?>
    <nav class="eventhub-pager" aria-label="Attendee pagination">
        <ul>
            <li>
                <?php if ($pager->hasPrevious()): ?>
                    <a class="pager-control" href="<?= esc($pager->getPrevious(), 'attr') ?>" aria-label="Previous page">
                        <i class="bi bi-chevron-left"></i>
                        <span>Previous</span>
                    </a>
                <?php else: ?>
                    <span class="pager-control disabled">
                        <i class="bi bi-chevron-left"></i>
                        <span>Previous</span>
                    </span>
                <?php endif; ?>
            </li>

            <?php foreach ($pager->links() as $link): ?>
                <li>
                    <?php if ($link['active']): ?>
                        <span class="pager-page active" aria-current="page"><?= esc($link['title'], 'html') ?></span>
                    <?php else: ?>
                        <a class="pager-page" href="<?= esc($link['uri'], 'attr') ?>"><?= esc($link['title'], 'html') ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>

            <li>
                <?php if ($pager->hasNext()): ?>
                    <a class="pager-control" href="<?= esc($pager->getNext(), 'attr') ?>" aria-label="Next page">
                        <span>Next</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                <?php else: ?>
                    <span class="pager-control disabled">
                        <span>Next</span>
                        <i class="bi bi-chevron-right"></i>
                    </span>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
<?php endif; ?>
