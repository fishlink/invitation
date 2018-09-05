<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>报障系统后台管理</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="../Wap/assets/vendor/jquery-2.1.4.min.js"></script>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/vendor/bootstrap.min.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/vendor/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <![endif]-->
</head>

<body class="login-layout blur-login">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <span class="white" id="id-text2">后台管理</span>
                        </h1>
                        <h4 class="blue" id="id-company-text">&copy; 斯品家居</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        请输入您的用户名和密码
                                    </h4>

                                    <div class="space-6"></div>

                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="name" required value="" class="form-control" placeholder="请输入登录账号" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" required class="form-control" placeholder="请输入登录密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>
                                            <div class="clearfix">
                                                <button class="width-35 btn btn-sm btn-primary" style="margin-left: 35%;">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110" onclick="login()">登录</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    <div class="space-6"></div>
                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->
                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->
</body>
</html>
<script>
    var submit = true;
    var login = function() {
        var name = $('input[name="name"]').val();
        var password = $('input[name="password"]').val();
        if(!name){
            alert('请输入账号');return;
        }
        if(!password){
            alert('请输入登录密码');return;
        }
        if (submit) {
            submit = false;
            $.post(
                'loginDeal.php',
                {name: name, password: password},
                function (res) {
                    submit = true;
                    if (res.s) {
                        alert(res.message);
                    } else {
                        setTimeout(function () {
                            location.href = res.url;
                        }, 500)
                    }
                }, 'json'
            );
        }
    }
</script>
