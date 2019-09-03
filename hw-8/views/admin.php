<h2>Управление заказами</h2>
<?foreach ($orders as $item):?>
    <div id="order_<?=$item['order_id']?>">
        Имя клиента: <?= $item['name']?><br>
        Телефон клиента: <?= $item['phone']?><br>
        Адрес клиента: <?= $item['adres']?><br>
        <?= $item['goodname']?> Артикул: <?= $item['goods_id']?>Количество: <?= $item['quantity']?> <br>


    </div>
<?endforeach;?>