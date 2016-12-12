<div id="container" style="background:#FFF;">
	<div id="body" style="width:600px;">
<code><?php echo $news_item['unique_name']; ?> 详细情况</code>
		<p>会费情况：</p>
		<code><?php foreach ($fee_item as $fee): ?>
缴费年份：&emsp;<?php echo $fee['year_time']; ?>&emsp; &emsp;
登记时间：&emsp;<?php echo $fee['fee_time'] ?><br />
<?php endforeach ?></code>
		<p>参加活动情况：</p>
		<code><?php foreach ($activity as $ac): ?>
活动名称：&emsp;<?php echo $ac['name']; ?><br />
<?php endforeach ?></code>
		<p>会员牌库存情况：</p>
<code><?php echo $news_item['card']; ?> </code>
	</div> 
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>