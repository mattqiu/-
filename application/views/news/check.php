<!--查询文章-->
<?php echo '<div class="content">' ?>
<?php echo validation_errors(); ?>
<?php echo form_open('news/check') ?>
  <p><h2><label for="title">请输入需要查询的新闻：</label></h2></p>
  <p><input type="input" name="text" class="form-control"/></p>
  <p><input type="submit" name="submit" value="查找" class="btn btn-primary btn-lg"/></p>
</form>
<?php echo '</div>' ?>
<hr>