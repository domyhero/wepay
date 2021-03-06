<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>后台管理</title>

<link href="/wepay/Public/Admin/css/pace-theme-flash.css" rel="stylesheet"/>

<link href="/wepay/Public/Admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- ico 字体图标 -->
<link href="/wepay/Public/Admin/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<!-- 水波特效 -->
<link href="/wepay/Public/Admin/css/waves.min.css" rel="stylesheet" type="text/css"/>

<link href="/wepay/Public/Admin/css/toastr.min.css" rel="stylesheet" type="text/css"/>

<!-- Theme Styles -->
<link href="/wepay/Public/Admin/css/modern.min.css" rel="stylesheet" type="text/css"/>
<link href="/wepay/Public/Admin/css/green.css" class="theme-color" rel="stylesheet" type="text/css"/>

<script src="/wepay/Public/Admin/js/jquery-2.1.4.min.js"></script>
<script src="/wepay/Public/Admin/layer/layer.js"></script>
<script src="/wepay/Public/Admin/vue/vue.js"></script>
<script src="/wepay/Public/Admin/vue/vue-resource.min.js"></script>

</head>
<body class="page-header-fixed">
<div class="pace pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99"
    style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner">
        </div>
    </div>
    <div class="pace-activity">
    </div>
</div>
<div class="overlay">
</div>
<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="<?php echo U('Index/index');?>" class="logo-text"> <span>后台管理</span> </a>
            </div>
            <!-- Logo Box -->

            <div class="topmenu-outer">

                <!-- Top Menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <li style="display:none">
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen">
                                <i class="fa fa-expand"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- Nav -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                            data-toggle="dropdown">
                                <span class="user-name">蔡唱松<i class="fa fa-angle-down"></i></span>
                                <span>0</span>
                            </a>
                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <li role="presentation">
                                    <a data-toggle="modal" data-target=".bs-example-modal-sm" href="#">
                                        <i class="fa fa-lock"></i>修改密码
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="/account/signin">
                                        <i class="fa fa-sign-out m-r-xs"></i>退出
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/account/signout" class="log-out waves-effect waves-button waves-classic">
                                <span><i class="fa fa-sign-out m-r-xs"></i>注销</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Nav -->
                </div>
                <!-- Top Menu -->

            </div>
            <!-- sidebar-pusher -->

        </div>
        <!-- navbar-inner -->
    </div>


    <!-- 修改密码 -->
    <div id="pwdmodify" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel"> 修改密码 </h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12">
                        <div class="input-group col-md-offset-2 col-md-8">
                            <span class="input-group-addon" id="sizing-addon2"> 旧密码 </span>
                            <input type="password" id="oldpwd" class="form-control" placeholder="旧密码" aria-describedby="sizing-addon2">
                        </div>
                        </br>
                        <div class="input-group col-md-offset-2 col-md-8">
                            <span class="input-group-addon" id="sizing-addon2">新密码</span>
                            <input type="password" id="firstnew" class="form-control" placeholder="新密码" aria-describedby="sizing-addon2">
                        </div>
                        </br>
                        <div class="input-group col-md-offset-2 col-md-8">
                            <span class="input-group-addon" id="sizing-addon2"> 确定密码 </span>
                            <input type="password" id="secondnew" class="form-control" placeholder="确定密码" aria-describedby="sizing-addon2">
                        </div>
                        </br>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="user" name="userid" value="590eb93fc241b672941fafcf">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="pwd_save">提交</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 修改密码 -->



    <div class="page-sidebar sidebar">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
            <div class="page-sidebar-inner slimscroll" style="overflow: hidden; width: auto; height: 100%;">
                <ul class="menu accordion-menu">

<?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- <li class="droplink <?php echo $_SERVER['PATH_INFO'] == $vo['route']? 'open':null ;?>"> -->
                    <li class="droplink">

<?php if($vo['level'] == 0 ): ?><a href="#" class="waves-effect waves-button">
                            <span class="menu-icon glyphicon <?php echo ($vo["ico"]); ?>"></span>
                            <p><?php echo ($vo["name"]); ?></p>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
                            <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if($vv['pid'] == $vo['id']): ?><li><a href="/wepay/admin.php/<?php echo ($vv["route"]); ?>"><?php echo ($vv["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>                    


                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
            <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.3; display: none; border-radius: 0px; z-index: 99; right: 0px; height: 768px; background: rgb(204, 204, 204);">
            </div>
            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; opacity: 0.2; z-index: 90; right: 0px; background: rgb(51, 51, 51);">
            </div>
        </div>
        <!-- Page Sidebar Inner -->
    </div>

    <div class="page-inner" id="app">


﻿ 
    

        <div class="page-title">
            <h3>用户管理</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">用户管理</a>
                    </li>
                    <li>
                        <a href="/user">查询用户</a>
                    </li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row m-t-md">
                <div class="col-md-12">
                    <div class="row mailbox-header">
                        <div class="pull-left" style="margin:0 0 0 15px;">
                            <a href="/user/edit" class="btn btn-success">添加用户</a>
                        </div>
                        <div class="pull-left" style="margin:0 0 0 15px;">
                            <a href="#" id="delete" class="btn btn-success">删除</a>
                        </div>
                        <div class="form-inline pull-right" style="margin:0 20px 0 0">
                            <form action="/user" method="get">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="user_id" name="user_id" type="text" class="form-control" placeholder="查询用户(用户id)"
                                        value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <select id="role_id" name="role_id" class="selectpicker" data-width="100%"
                                        data-live-search="true">
                                            <option value="0" selected=selected>
                                                用户角色
                                            </option>
                                            <option value="58db567cc241b61113b1e88e">
                                                管理员
                                            </option>
                                            <option value="58db567cc241b61113b1e890">
                                                代理商
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit" style="margin-right:20px">
                                                <i class="fa fa-search">
                                                </i>
                                            </button>
                                        </span>
                                        <a href="/user" class="btn btn-success" style="width:90px;">重置用户</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mailbox-content panel">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper">

  <table id="example" class="table dataTable display" width="100%"> 
   <thead> 
    <tr> 
     <th colspan="1" style="width:6%"> <span> <input id="selectall" type="checkbox" class="check-mail-all" /> </span> </th> 
     <th nowrap="nowrap" style="width:13%"> <span> 名称 </span> </th> 
     <th nowrap="nowrap" style="width:10%"> <span> 佣金 </span> </th> 
     <th nowrap="nowrap" style="width:10%"> <span> 红利 </span> </th> 
     <th nowrap="nowrap" style="width:12%"> <span> 代理商 </span> </th> 
     <th nowrap="nowrap" style="width:8%"> <span> 角色名称 </span> </th> 
     <th nowrap="nowrap" style="width:8%"> <span> 金额 </span> </th> 
     <th nowrap="nowrap" style="width:15%"> <span> 注册时间 </span> </th> 
     <th nowrap="nowrap" style="width:150px;text-align:center"> <span> 功能 </span> </th> 
    </tr> 
   </thead> 
   <tbody> 
    <tr class="unread"> 
     <td> <span> <input type="checkbox" class="checkbox-mail cb" data-id="590eb93fc241b672941fafcf" /> </span> </td> 
     <td id="mod"> <a href="/user/edit?id=590eb93fc241b672941fafcf"> 123512【蔡唱松】 </a> </td> 
     <td> 0.5% </td> 
     <td> 95.0% </td> 
     <td> YT032【YT032】 </td> 
     <td> 代理商 </td> 
     <td> 0 </td> 
     <td> 2017-05-07 20:45</td> 
     <td> 
        <div style="float:left; margin:0 5px 5px 0;"> 
            <a href="" class="btn btn-success"> 开启 </a> 
        </div> 
        <div style="float:left; margin:0 5px 5px 0;"> 
            <a href="#" onclick="" class="btn btn-success"> 出金 </a> 
        </div> 
     </td> 
    </tr> 

   </tbody> 
   <tbody>
    <tr class="unread"> 
     <td> <span> 合计 </span> </td> 
     <td> <span> 角色: 会员 </span> </td> 
     <td> <span> 1位 </span> </td> 
     <td> <span> 0元 </span> </td> 
     <td> </td> 
     <td> </td> 
     <td> </td> 
     <td> </td> 
     <td> </td> 
    </tr> 
   </tbody>
  </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>








    </div>
    <!-- Page Inner -->




<div class="cd-overlay"></div>



<script src="/wepay/Public/Admin/js/bootstrap.min.js"></script>
<script src="/wepay/Public/Admin/js/jquery-ui.min.js"></script>

<script src="/wepay/Public/Admin/js/jquery.slimscroll.js"></script>
<script src="/wepay/Public/Admin/js/jquery.uniform.js"></script>


<!-- 水波特效 -->
<script src="/wepay/Public/Admin/js/waves.min.js"></script>
<!-- 弹窗 -->
<script src="/wepay/Public/Admin/js/toastr.min.js"></script>
<!-- 菜单栏伸缩 -->
<script src="/wepay/Public/Admin/js/modern.min.js"></script>
<script>
layer.config({
  skin: 'layui-layer-green'
})
    // layer.tips('Hi,欢迎使用!', '.user-name');  
</script>   

</body>
</html>