<?php echo '<div class="content">' ?>
<?php foreach ($news as $news_item): ?>
	<div class="single">
    <div class="title_single"><h2><?php echo $news_item['title'] ?></h2></div>
    <div class="main">
        <?php echo $news_item['text'] ?>
    </div>
    <div class="more">
    	<a href="http://localhost/ci/index.php/news/<?php echo $news_item['slug'] ?>">查看更多</a>
    </div>
    </div>
<?php endforeach ?>
<?php echo '</div>' ?>
