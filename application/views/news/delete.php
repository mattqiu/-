<?php echo '<div class="content">' ?>
<?php echo '<table width="403" border="1" class="table table-striped">
				<tr>
    				<td width="82">ID</td>
    				<td width="305">Content</td>
  				</tr>' ?>
<h2>新闻列表</h2>
<?php foreach ($news as $news_item): ?>
    <?php 
    	echo '
  				<tr>
    				<td width="82">'.$news_item['id'].'</td>
    				<td width="305">'.$news_item['title'].'</td>
  				</tr>
			';
    ?>
<?php endforeach ?>
<?php echo '</table>' ?>

<h2>删除新闻</h2>
<!--delete form-->
<?php echo validation_errors(); ?>
<?php echo form_open('news/delete') ?>
  <p><label for="title">请输入需要删除的新闻的ID,删除多篇请用","隔开：</label></p>
  <p><input type="input" name="id" class="form-control" /></p>
  <p><input type="submit" name="submit" value="确认删除" class="btn btn-danger btn-lg" /></p>
</form>
<?php echo '</div>' ?>
<hr>