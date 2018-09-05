<?php
include_once '../../mysql/Mysql.php';
$keyword = isset($_GET['sk'])?trim($_GET['sk']):'';
$sql = "select `id`,`realname`,`mobile`,`add_time` from `user` order by `id` DESC";
if($keyword){
    $sql = "select `id`,`realname`,`mobile`,`add_time` from `user` where `realname` like '{$keyword}%' or `mobile` like '{$keyword}%' order by `id` DESC";
}
$list = (new Mysql())->select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>管理后台</title>

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/vendor/bootstrap.min.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/vendor/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    报名用户列表
                </small>
            </a>
        </div>
        <input type="button" class="btn btn-primary btn-danger" style="float: right;" value="退出登录">
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>


    <div class="main-content">
        <div class="main-content-inner">

            <div class="page-header" style="margin-bottom: 20px;margin-right: 50px;">
                <form action="" method="get">

                    <input type="button" class="btn btn-sm btn-round btn-info pull-right" style="margin-left:20px;width:50px;" value="导出" onclick="exportFaultSheet()">

                    <button class="btn btn-sm btn-round btn-info pull-right"  style="margin-left:20px;width:50px;"  type="submit">
                        查询
                    </button>

                    <span class="pull-right" style="margin-left: 20px;">
                        <input type="text" name="sk" class="pull-right" style="margin-left: 10px;" placeholder="请输入姓名或手机号" value="<?php echo trim($keyword)?>">
                    </span>
                </form>
            </div>

            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="simple-table" class="table  table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center" style="width: 33%">用户姓名</th>
                                        <th class="center" style="width: 33%">手机号码</th>
                                        <th class="center" style="width: 33%">报名时间</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if($list){
                                        foreach ($list as $v){
                                    ?>
                                    <tr>
                                        <td class="center"><?php echo $v['realname']?>
                                        </td>
                                        <td class="center"><?php echo $v['mobile']?>
                                        </td>
                                        <td class="center"><?php echo $v['add_time']?>
                                        </td>
                                    </tr>
                                    <?php }}?>
                                    </tbody>
                                </table>
                            </div><!-- /.span -->
                        </div><!-- /.row -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">斯品家居</span>
							 &copy; 2018
						</span>

                &nbsp; &nbsp;
                <span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
            </div>
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->
</body>
</html>
