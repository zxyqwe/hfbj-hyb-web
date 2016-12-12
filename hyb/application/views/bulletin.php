<div class="container-fluid" style="padding-bottom: 70px;">
    <div id="container" class="col-md-10 col-md-offset-1 column">
	<div id="body">
		<style type="text/css">td{overflow:auto;}</style>
		<p><br />会费收缴情况公告栏：（<i class="glyphicon glyphicon-star"></i>：已缴费，<i class="glyphicon glyphicon-circle-arrow-right"></i>：下一次缴费点）搜索不到可能是因为乱码字符转换为'?'</p>
		<table width="100%" border="1" cellpadding="2" cellspacing="1" data-toggle="table" data-url="/hyb/bulletin/data" class="table table-hover table-condensed" data-search="true" data-pagination="true">
    <thead>
    <tr>
        <th data-field="name" data-formatter="idFormatter">会员编号</th><th data-field="id" data-visible="false">ID</th>
         <?php for ($i=2013; $i<=2027; $i++){ ?><th data-field="<?php echo $i; ?>" data-formatter="nameFormatter"><?php echo $i; ?></th><?php } ?>
    </tr>
    </thead>
</table>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</div>
<div id="myDiv" onmouseout="javascript:w()"></div>
<script type="text/javascript">
function idFormatter(value, row) {
		return '<a onmouseover="javascript:s('+row.id+');">'+row.name+'</a>';
}
function nameFormatter(value, row) {
	if(value===1)
		return '<i class="glyphicon glyphicon-star"><div class="sr-only">√</div></i>';
	else if(value===2) 
		return '<i class="glyphicon glyphicon-circle-arrow-right"></i>'; 
	else
		return '';
}
function w(){ 
	document.getElementById("myDiv").style.top = -1000+"px"; 
}
function s(i){
	loadXMLDoc(i);
	var b = Math.max(document.body.scrollTop , document.documentElement.scrollTop);
	document.getElementById("myDiv").style.top = b+100+"px"; 
}
function xxx(xmlhttp,i)
{
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
  		document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","/hyb/bulletin/view_js/"+i,true);
  xmlhttp.send();
}
function loadXMLDoc(i)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  	xmlhttp=new XMLHttpRequest();
  }
	else
  {// code for IE6, IE5
  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xxx(xmlhttp,i);
}
</script>
