<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<LINK href="/favicon.ico" type="image/x-icon" rel=icon>
	<LINK href="/favicon.ico" type="image/x-icon" rel="shortcut icon">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen">
	<link href="/css/bootstrap-table.min.css" rel="stylesheet">
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap-table.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap-table-zh-CN.min.js"></script>
	<title>汉服北京会员部管理系统</title>

	<style type="text/css">
	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }
	body {
		background-color: #fff;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	#body{
		margin: 0 15px 0 15px;
	}	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
    #back-to-top{	
        position:fixed;
        bottom:50px;
        right:60px;
        display:none;
    }
    #back-to-top a{
        text-align:center;
        text-decoration:none;
        color:#d1d1d1;
        display:block;
        width:80px;
        -moz-transition:color 1s; 
        -webkit-transition:color 1s;
        -o-transition:color 1s;
    }
    #back-to-top a:hover{
        color:#979797;
    }
    #back-to-top a span{
        background:#d1d1d1;
        border-radius:6px;
        display:block;
        height:80px;
        width:80px;
        background:#d1d1d1 url(/img/arrow-up.png) no-repeat center center;
        margin-bottom:5px;
        -moz-transition:background 1s;
        -webkit-transition:background 1s;
        -o-transition:background 1s;
    }
    #back-to-top a:hover span{
        background:#979797 url(/img/arrow-up.png) no-repeat center center;
        }	
	#container{
		margin-top: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}	
	#myDiv {position:absolute;right:100px;z-index:5;} 
	</style>
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
	$(document).ready(function(){
		$("#back-to-top").hide();
		$(function () {
			$(window).scroll(function(){
				if ($(window).scrollTop()>100){
					$("#back-to-top").fadeIn(700);
				}
				else
				{
					$("#back-to-top").fadeOut(700);
				}
			});
			$("#back-to-top").click(function(){
				$('body,html').animate({scrollTop:0},1000);
				return false;
			});
		});

	});

</script>
</head>
<body>
<p id="back-to-top"><a href="#top"><span></span>返回顶部</a></p>