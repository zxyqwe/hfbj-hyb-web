<script type="text/javascript">
function validate_form()
{
	self.location='http://app.hanbj.cn/hyb/welcome/log/' + new Date(document.getElementById('date').value).getTime()/1000;
}
</script>

<div class="container-fluid" style="padding-bottom: 70px;">
    <div id="container" class="col-md-10 col-md-offset-1 column">
<div id="body">
	<p><br />请输入日期：<div class="well">
  <div id="datetimepicker1" class="input-append date">
    <input data-format="yyyy-MM-dd hh:mm:ss" name="date" type="text" id="date" value='<?php echo $tid; ?>'></input>
    <span class='add-on'><i data-time-icon="glyphicon-time" data-date-icon="glyphicon glyphicon-calendar"></i></span>
  </div>
</div>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'zh-CN'
    });
  });
</script> <button onclick='validate_form();';>Go!</button></p>
<br />
<p><?php echo $tid; ?>之后所有记录</p>
<p>Fee Log:</p>
<code>
<?php foreach ($log_fee as $log_fee_item): ?>
<li>会员编号：<?php echo $log_fee_item['unique_name']; ?> 操作者：<?php echo $log_fee_item['oper']; ?> 缴费时间：<?php echo $log_fee_item['fee_time'] ?> 缴费年份：<?php echo $log_fee_item['year_time']; ?> <?php if($log_fee_item['unoper']!=NULL){echo ' （已撤销 操作者：'.$log_fee_item['unoper'].' 撤销时间：'.$log_fee_item['unfee_time'].'）';} ?></li>
<?php endforeach ?>
</code>
<p>UnFee Log:</p>
<code>
<?php foreach ($log_unfee as $log_unfee_item): ?>
<li>会员编号：<?php echo $log_unfee_item['unique_name']; ?> 操作者：<?php echo $log_unfee_item['unoper']; ?> 撤销时间：<?php echo $log_unfee_item['unfee_time'] ?> 撤销年份：<?php echo $log_unfee_item['year_time']; ?> （缴费操作者：<?php echo $log_unfee_item['oper']; ?> 缴费时间：<?php echo $log_unfee_item['fee_time'] ?>）</li>
<?php endforeach ?>
</code> 
<p>Activity Log:</p>
<code>
<?php foreach ($log_act as $log_act_item): ?>
<li>会员编号：<?php echo $log_act_item['unique_name']; ?> 操作者：<?php echo $log_act_item['oper']; ?> 记录时间：<?php echo $log_act_item['act_time'] ?> 活动名称：<?php echo $log_act_item['name']; ?></li>
<?php endforeach ?>
</code>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</div>
