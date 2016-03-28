<div id="container">
	<div id="body">
		<style type="text/css">td{overflow:auto;}</style>
		<p>会费收缴情况公告栏:</p>
		<code>
		<table width="100%" border="1" cellpadding="2" cellspacing="1"><tr><td>会员编号</td></tr>
<?php foreach ($name as $member): ?><?php		
		$boo=array();
    foreach ($news as $news_item)
    {
     	if($member['unique_name']  === $news_item['unique_name'])
     	{ 
     		$boo[$news_item['year_time']]=true;
     	}
    }
     ?>
<tr><td onmouseover="javascript:s(<?php echo $member['id'] ?>);"><?php echo $member['unique_name'].':'.$member['tieba_id']; ?></td><?php for ($i=2013; $i<=2027; $i++){ ?><td <?php if(array_key_exists($i,$boo))echo 'class="is"'; ?>><?php echo $i; ?></td><?php } ?></tr>
<?php endforeach ?></table>
			</code>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<div id="myDiv" onmouseout="javascript:w()"></div>
<script type="text/javascript">
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
