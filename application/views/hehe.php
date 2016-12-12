<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        汉服北京会员部管理系统
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css"
        /-->
    <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css"
        /-->
    <!--script src="js/less-1.3.3.min.js"></script-->
    <!--append ‘#!watch’ to the browser URL, then refresh the page. -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="js/html5shiv.js">
            </script>
        <![endif]-->
    <!-- Fav and touch icons -->
</head>

<body class="color">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="row" style="margin:150px 0px 100px 0px">
                    <div class="col-md-6 col-md-offset-3 column">
                        <div class="caption">
                            <h3 class="text-center">
                                    汉服北京会员部管理系统
                                </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 column">
                                <form class="form-horizontal login-form" action="welcome" method="post" novalidate="novalidate">
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="controls">
                                                <input id="user" name="user" type="text" placeholder="用户名" class="required form-control input-lg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <input id="mm" name="mm" type="password" placeholder="密码" class="required form-control input-lg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="control-group">
                                                <button type="button" id="login" class="btn btn-block btn-lg btn-primary">
                                                    立即登录
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="col-md-1 column">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script Language="JavaScript" src="/js/log_help.js"></script>
    <script>
    $(document).ready(function() {
Login.init();
    });
    </script>
</body>
</html>
