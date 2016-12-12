<div class="container-fluid" style="padding-bottom: 70px;">
    <div id="container" class="col-md-10 col-md-offset-1 column">
    <div id="body">
        <style type="text/css">td{overflow:auto;}</style>
        <p><br />会员信息：</p>
        <table width="100%" border="1" cellpadding="2" cellspacing="1" data-toggle="table" data-url="/hyb/welcome/all/1" class="table table-hover table-condensed" data-search="true" data-pagination="true">
    <thead>
    <tr>
        <th data-field="id" data-formatter="fee_url"><i class="glyphicon glyphicon-tags"><div class="sr-only">√</div></i></th>
        <th data-field="unique_name">会员编号</th>
        <th data-field="tieba_id">贴吧ID</th>
        <th data-field="gender">？</th>
        <th data-field="phone">手机号</th>
        <th data-field="rn">真实姓名</th>
        <th data-field="eid">身份证</th>
        <th data-field="master">审核人</th>
        <th data-field="card">牌</th>
        <th data-field="QQ">QQ号</th>
        <th data-field="mail">电子邮件</th>
        <th data-field="pref">兴趣爱好</th>
        <th data-field="web_name">常用网名</th>
    </tr>
    </thead>
</table>
    </div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</div>
<div id="myDiv"></div>
<script type="text/javascript">
function s(i){
  $.get("/hyb/welcome/view_js/"+i,
    function(data){
        $('#myDiv').removeClass('sr-only');
      $("#myDiv").html(data); 
    }
);
  var b = Math.max(document.body.scrollTop , document.documentElement.scrollTop);
  $("#myDiv").css('top', b+100+"px");
}
function fee_url(value, row) {
  return '<a onmouseover="javascript:s(' + value + ');"><i class="glyphicon glyphicon-list"><div class="sr-only">√</div></i></a>';
}
</script>
