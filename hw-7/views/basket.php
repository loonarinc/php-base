<h2>Корзина</h2>
<? foreach ($basket as $item): ?>
    <div>
        <form action="/basket/del/<?=$item["id"]?>/" method="get">
            <a href="/item/<?= $item["id"] ?>">
                <b><?= $item['name'] ?></b><br>
                <img width="150" src="/img/<?= $item['image'] ?>" alt=""></a><br>
            Цена: <?= $item['price'] ?><br>
            Количество: <?= $item['quantity']?><br>
            <input type="submit" value="Удалить">
            <hr>
        </form>
    </div>
<? endforeach; ?>

<form action="/order/ordercomplete/" method="post">
    <input type='tel' name='phone' placeholder='Номер телефона'>
    <input type="submit" value="Оформить заказ">
</form>
