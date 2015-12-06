<?php
	$id=$_GET['id'];
	$conn=mysql_connect('localhost','root','zyl19961020') or die('连接错误');
	mysql_select_db('elaine');
	mysql_query("set names utf8");
	$result=mysql_query("select * from message where id=$id");
	while($row=mysql_fetch_array($result))
	{
		$title=$row["title"];
		$content=$row["content"];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>添加回复</title>
	<meta charset="utf8">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body style="margin:20px auto;margin-left:40px">
	<audio autoplay="autoplay" loop="-1" height="100" width="100">
		<source src="music/乱红.mp3" type="audio/mp3">
	</audio>
	<div style="margin:20px auto">
		<form action="replyHandle.php?id=<?php echo $id;?>" class="form-inline" method="post">
		标题：<input  class="form-control" style="margin-left:21px" name="title" type="text" size="30" placeholder="<?php echo $title;?>"/><br/><br/>
		内容：<textarea  class="form-control" style="margin-left:21px" name="content" rows="5" cols="25" placeholder="<?php echo $content;?>"></textarea><br/><br/>
		回复：<textarea  class="form-control" style="margin-left:21px" name="rcontent" rows="5" cols="25"></textarea><br/><br/>
		<table>
			<td>
				<tr><input style="margin-left:80px" type="submit" name="submit" value="添加回复" class="button" /></form></tr>
				<tr>&nbsp;&nbsp;<input type="reset" name="reset" value="重置" class="button" /></tr>
				<tr><form class="form-inline" role="form" action="message.php" method="post" width="30px">
               		&nbsp;&nbsp;<input type="submit" name="submit" value="退出" class="button"/></form></tr>
			</td>
		</table>
	</div>
</body>
</html>