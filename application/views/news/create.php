<?php echo '<div class="content">' ?>
<div class="add_title"><h2>添加新闻</h2></div>
<?php echo validation_errors(); ?>
<?php echo form_open('news/create') ?>
  <h3><label for="title">标题</label></h3>
  <p><input type="input" name="title" class="form-control" /></p>
  <h3><label for="text">内容</label></h3>
  <p><input type="text" name="text" class="form-control" /></textarea></p>
  <p><input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg" /></p>
</form>

<?php echo '</div>' ?>
<hr>