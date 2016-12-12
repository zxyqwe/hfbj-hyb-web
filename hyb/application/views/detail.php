<div class="container-fluid" style="padding-bottom: 70px;">
    <div id="container" class="col-md-10 col-md-offset-1 column">
	<div id="body">
		<p>Detail:</p>
		<code>
			贴吧id：&emsp;<?php echo $news_item['tieba_id']; ?><br />
			性别：&emsp;<?php echo $news_item['gender']; ?><br />
			电话：&emsp;<?php echo $news_item['phone']; ?><br />
			QQ：&emsp;<?php echo $news_item['QQ']; ?><br />
			邮箱：&emsp;<?php echo $news_item['mail']; ?><br />
			喜好：&emsp;<?php echo $news_item['pref']; ?><br />
			常用网名：&emsp;<?php echo $news_item['web_name']; ?><br />
			编号：&emsp;<?php echo $news_item['unique_name']; ?><br />
			审核人：&emsp;<?php echo $news_item['master']; ?><br />
			会员牌：&emsp;<?php echo $news_item['card']; ?> 
			身份证：&emsp;<?php echo $news_item['eid']; ?> 
			真名：&emsp;<?php echo $news_item['rn']; ?> 
			</code>
		<p>Fee:</p>
		<code><?php foreach ($fee_item as $fee): ?>
缴费年份：&emsp;<?php echo $fee['year_time']; ?>&emsp; &emsp;
登记时间：&emsp;<?php echo $fee['fee_time'] ?>&emsp; &emsp;
登记人：&emsp;<?php echo $fee['oper'] ?><br />
<?php endforeach ?></code>
		<p>Activity:</p>
		<code><?php foreach ($activity as $ac): ?>
活动名称：&emsp;<?php echo $ac['name']; ?>&emsp; &emsp;
登记人：&emsp;<?php echo $ac['oper'] ?><br />
<?php endforeach ?></code>
		<p><a  href="/hyb/welcome/all/" >View all members</a></p>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</div>