<!doctype html>
<html>
<head>
<title>Jsdelivr缓存清理工具</title>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
  integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
  crossorigin="anonymous"
/>
<script
  src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
  integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
  crossorigin="anonymous"
></script>
</head>
<body class="mdui-theme-layout-dark mdui-container">
<div class="mdui-card">
      <div class="mdui-card-primary">
        <div class="mdui-card-primary-title">Jsdelivr-CCT</div>
        <div class="mdui-card-primary-subtitle">缓存清理工具</div>
      </div>
<?php
$u=$_GET['u'];
if ($u==""){
?>
<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">assignment_turned_in</i></span> <span class="mdui-chip-title">在这里输入链接</span></div><form action="./index.php" target="_blank"><div class="mdui-textfield mdui-textfield-floating-label"><label class="mdui-textfield-label">链接</label> <input class="mdui-textfield-input" type="text" name="u"></div><input class="mdui-btn mdui-ripple" type="submit" value="提交"></form>
<a class="mdui-btn mdui-ripple mdui-btn-block" href="https://github.com/dYXMO/Jsdelivr-CCT">在Github查看源码</a>
<?php
}else{
$u=str_replace("https://","",$u);
$u=str_replace("cdn.jsdelivr","https://purge.jsdelivr",$u);
$b=file_get_contents($u);
?>

<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-blue"><i class="mdui-icon material-icons">done</i></span> <span class="mdui-chip-title">结果：<?php echo json_decode($b,true)['status']?></span></div>
<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-green"><i class="mdui-icon material-icons">assignment</i></span> <span class="mdui-chip-title">请求id：<?php echo json_decode($b,true)['id']?></span></div>
<div class="mdui-chip"><span class="mdui-chip-icon mdui-color-purple"><i class="mdui-icon material-icons">access_alarms</i></span> <span class="mdui-chip-title">时间：<?php echo json_decode($b,true)['timestamp']?></span></div>
<br>
<a class="mdui-btn mdui-ripple" href="./index.php">返回首页</a>
<?php } ?>
</div>

</body>
</html>
