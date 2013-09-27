<?php echo '<div class="content">' ?>
<?php echo '<table width="403" border="1" class="table table-striped">
				<tr>
    				<td width="82">ID</td>
    				<td width="305">标题</td>
    				<td width="305">内容</td>
  				</tr>' ?>
<h2>新闻列表</h2>
<?php foreach ($news as $news_item): ?>
    <?php 
    	echo '
  				<tr>
    				<td width="82">'.$news_item['id'].'</td>
    				<td width="305">'.$news_item['title'].'</td>
    				<td width="305">'.$news_item['text'].'</td>
  				</tr>
			';
    ?>
<?php endforeach ?>
<?php echo '</table>' ?>

<!--修改文章-->
<?php echo validation_errors(); ?>
<?php echo form_open('news/edit') ?>
  <h3>要修改的新闻的ID</h3>
  <p><input type="input" name="id" class="form-control"/></p>
  <h3>要修改的新闻的标题</h3>
  <p><input type="input" name="title" class="form-control"/></p>
  <h3>要修改的新闻的内容</h3>
  <p><input type="input" name="text" class="form-control"/></p>
  <p><input type="submit" name="submit" value="确认修改" class="btn btn-primary btn-lg"/></p>
</form>
<?php echo '</div>' ?>
<hr>