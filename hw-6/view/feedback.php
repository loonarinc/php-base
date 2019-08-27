<h2>Отзывы</h2>
<?=$error?>
<form action="/feedback/<?=$params['action']?>/<?=$params['id']?>" method="post">
    Оставьте отзыв: <br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$params['row']['name']?>"><br>
    <input type="text" name="message" placeholder="Ваш отзыв" value="<?=$params['row']['feedback']?>"><br>
    <input type="submit" value="<?=$params['action']=='save'?'Править':'Отправить'?>">
</form>
<?foreach ($feedback as $item): ?>
    <p>
        <b><?=$item['name']?>:</b> <?=$item['feedback']?> <a href="/feedback/edit/<?=$item['id']?>">[править]</a>  <a href="/feedback/delete/<?=$item['id']?>">[x]</a><br>
    </p>
<?endforeach;?>