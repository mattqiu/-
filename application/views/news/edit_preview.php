<?php foreach ($news as $news_item): ?>
    <h2><?php echo $news_item['id'].':'; echo $news_item['title'] ?></h2>
    <div id="main">
        <?php echo $news_item['text'] ?>
    </div>
<?php endforeach ?>