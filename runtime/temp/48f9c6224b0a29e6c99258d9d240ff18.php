<?php /*a:5:{s:78:"E:\Code\github\passivescan\pbscan_web\application\admin\view\result\index.html";i:1547461447;s:78:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_meta.html";i:1546932346;s:77:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_nav.html";i:1547460882;s:76:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_js.html";i:1546932346;s:80:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_footer.html";i:1546932346;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pbscan管理后台</title>
    <link rel="shortcut icon" href="/static/admin/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pbscan管理后台</title>
    <link rel="shortcut icon" href="/static/admin/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/admin/css/main.css">
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pbscan</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo url('admin/home/index'); ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="<?php echo url('admin/result/index'); ?>"><span class="glyphicon glyphicon-eye-open"></span> 漏洞管理 <span class="label label-danger"><?php echo htmlentities($result_count); ?></span></a></li>
                <li><a href="<?php echo url('admin/result/history'); ?>"><span class="glyphicon glyphicon-globe"></span> 扫描历史 <span class="label label-success"><?php echo htmlentities($scan_count); ?></span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo session('admin.username'); ?></a></li>
                <li><a href="<?php echo url('admin/home/logout'); ?>"><span class="glyphicon glyphicon-off"></span> 退出</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/admin/result/index'); ?>">漏洞列表</a></li>
            <li><a href="<?php echo url('/admin/result/index?hide=1'); ?>">已修复漏洞</a></li>
        </ol>
            <h2>漏洞列表</h2>
            <table class="table table-bordered table-hover table-striped">
                <div class="pull-left"><?php if($results->count() > 0): ?>共计<?php echo htmlentities($results->count()); ?>条<?php else: ?>无数据<?php endif; ?></div>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>漏洞url</th>
                    <th><span class="label label-danger">H</span>
                        <span class="label label-warning">M</span>
                         <span class="label label-primary">L</span>
                        <span class="label label-success">I</span></th>
                    <th>发包数</th>
                    <th>漏洞数</th>
                    <th>污染点</th>
                    <th>扫描时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($results) || $results instanceof \think\Collection || $results instanceof \think\Paginator): $i = 0; $__LIST__ = $results;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(session('admin.token') == $vo['token']): ?>
                <tr>
                    <td  data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo htmlentities($vo['id']); ?></td>
                    <td  data-toggle="modal" data-target=".bs-example-modal-lg" style="word-wrap:break-word;word-break:break-all;table-layout:fixed; word-wrap: break-word; max-width:600px"><?php echo htmlentities($vo['scanUrl']); ?></td>
                    <td  data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo $vo['issueList']; ?></td>
                    <td  data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo htmlentities($vo['request_num']); ?></td>
                    <td  data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo htmlentities($vo['issues_num']); ?></td>
                    <td  data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo htmlentities($vo['insert_point']); ?></td>
                    <td  data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo htmlentities($vo['scanTime']); ?></td>
                    <td><a href="/admin/result/delete?rid=<?php echo htmlentities($vo['rid']); ?>" data-id="<?php echo htmlentities($vo['rid']); ?>" data-file="<?php echo htmlentities($vo['saveFile']); ?>">删除</a>&nbsp
                        <a href="/admin/result/hide?rid=<?php echo htmlentities($vo['rid']); ?>">标为修复</a></td>
                </tr>

                <?php endif; ?>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <nav>
                <?php echo $results->render(); ?>
            </nav>
    </div>
</div>

    <!-- /Page Container -->
    <!-- Main Container -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">漏洞详情</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>



<script src="/static/admin/js/jquery-3.3.1.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<script>
    $("tbody tr td:not(:last)").click(function(){
        var rid = $(this).parent().find("td:last a").attr("data-id");
        var saveFile = 'http://10.16.45.88:7002/'+$(this).parent().find("td:last a").attr("data-file");
        $.ajax({
            url:"<?php echo url('/admin/result/issue?rid='); ?>"+rid,
            dataType:'json',
            success:function(data,status){
                if(status == "success"){
                    htmldata = '\
                <p>\
                    <b><span>漏洞rid：</span></b>\
                    <span>'+rid+'</span>\
                </p>\
                <p>\
                    <b><span>漏洞报表：</span></b>\
                    <span><a href="'+saveFile+'" target="_blank">'+saveFile+'</a></span>\
                </p>';
                    results = JSON.parse(data);
                    for(i in results){
                        json = results[i]
                        htmldata += '\
				<p>\
					<b><span>漏洞名称：</span></b>\
					<span><font color="#FF0000">'+json.issueName+'</font></span>\
				</p>\
				<p>\
					<b><span>漏洞等级：</span></b>\
					<span>'+json.issueSeverity+'</span>\
				</p>\
				<p>\
					<b><span>漏洞可信度：</span></b>\
					<span>'+json.issueConfidence+'</span>\
				</p>\
				<p>\
					<b><span>漏洞Url：</span></b>\
					<span>'+json.issueUrl.replace(/\r\n/g,"<br/>")+'</span>\
				</p>\
				<p>\
					<b><span>漏洞细节：</span></b>\
					<span>'+json.issueDetail+'</span>\
				</p>\
			';
                    $(".modal-body").html(htmldata)}
                }
            }
        });
        });
</script>



<script src="/static/admin/js/jquery-3.3.1.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
</body>
</html>