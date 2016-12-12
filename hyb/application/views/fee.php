<style type="text/css">  
.comments {  
 width:100%;
 overflow:auto;  
 word-break:break-all;  
}  
</style> 
<div class="container-fluid" style="padding-bottom: 70px;">
    <div id="container" class="col-md-10 col-md-offset-1 column">
	<h1>添加会费</h1>
	<div id="body">
	<label for="text">范例：</label><br />
	<code>坎丙午,坎丙午,乾甲子</code>
	<p>代表給坎丙午缴费两次，乾甲子缴费一次。注意中间的逗号分隔符为半角符号。</p>
	</div>

	<div id="body">
		<?php echo validation_errors(); ?>
		
		<?php echo form_open('welcome/fee') ?>
		
		  <label for="text">内容</label><br />
		  <code><textarea name="text" class="comments" rows="10" ></textarea><br /></code>
		  
		  <input type="submit" name="submit" value="添加" /> 
		
		</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</div>