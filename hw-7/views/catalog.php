<? foreach ($goods as $good): ?>
    <div>
        <form action="/basket/add/<?=$good["id"]?>/" method="get">
            <a href="/item/<?= $good["id"] ?>">
                <b><?= $good['name'] ?></b><br>
                <img width="150" src="/img/<?= $good['image'] ?>" alt=""></a><br>
            Цена: <?= $good['price'] ?><br>
            <input type="submit" value="Добавить в корзину">
            <hr>
        </form>
    </div>
<? endforeach; ?>