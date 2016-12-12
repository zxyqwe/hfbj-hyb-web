<style type="text/css">  
.comments {  
 width:100%;
 overflow:auto;  
 word-break:break-all;  
}  
</style> 
<div class="container-fluid" style="padding-bottom: 70px;">
    <div id="container" class="col-md-10 col-md-offset-1 column">
	<h1>创建条目</h1>
	<div id="body">
	<label for="text">范例：</label><br />
	<code>贴吧名字,性别,手机号,QQ号,邮箱,兴趣爱好,常用网名,选择编号,审核员<br />贴吧名字,性别,手机号,QQ号,邮箱,兴趣爱好,常用网名,选择编号,审核员</code>
	<p>代表注册了两个新会员，两个会员中间要换行一次。注意中间的逗号分隔符为半角符号，一共8个半角逗号。</p>
	</div>

	<div id="body">
		<?php echo validation_errors(); ?>
		
		<?php echo form_open('welcome/create') ?>
		
		  <label for="text">内容</label><br />
		  <code><textarea name="text" class="comments" rows="10" ></textarea><br /></code>
		  
		  <input type="submit" name="submit" value="创建" /> 
		
		</form>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</div>