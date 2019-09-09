<h2>Управление моими заказами</h2>
<table class="table">
    <tr>
        <th>Номер</th>
        <th>Дата заказа</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    <?foreach ($orders as $order):?>
        <tr id="order-<?= $order['id'] ?>">
            <td><?= $order['id'] ?></td>
            <td><?= $order['dt_start'] ?></td>
            <td class="status">
                <?php if ($order['status'] == "active"):?>
                    В обработке
                <?php elseif ($order['status'] == "complete"):?>
                    Проведен
                <?php elseif ($order['status'] == "canceled"):?>
                    Отменён
                <?php endif?>
            </td>
            <td>
                <?php if ($order['status'] == "active"):?>
                    <button class="btn_cancel" id="<?= $order['id'] ?>">Отменить</button>
                <?php endif?>

            </td>
        </tr>
    <?endforeach;?>
</table>
