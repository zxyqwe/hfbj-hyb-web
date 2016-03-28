<div id="container" style="background:#FFF;">
	<div id="body" style="width:600px;"><br />
		<span onclick="javascript:$('#myDiv').addClass('sr-only');">
			<i class="glyphicon glyphicon-remove-circle"><div class="sr-only">√</div></i>
		</span>
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
	</div> 
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>