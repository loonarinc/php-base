<div class="container">
    <div class="images_wrap">
        <? foreach ($images as $item): ?>
            <div class="image">
                <a href="/viewimg/?id=<?= $item['url'] ?>&alt=<?= $item['name'] ?>&views=<?= $item['views'] ?>"
                   target="_blank"><img
                            src="<?= IMAGES_SMALL_DIR . $item['url'] ?>" alt="<?= $item['name'] ?>"></a>
                <p>Популярность: <?= $item['views'] ?></p>
            </div>
        <? endforeach; ?>
    </div>
</div>
