<!DOCTYPE html>
<html>
<head>
	<title>显示留言</title>
	<meta charset="utf8">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript"> 
        function hide(obj)  
		{
			var tmp=document.getElementsByName("reply1");
			var index;
			for(var i=0;i<tmp.length;i++)
				if(obj==tmp[i])
					index=i;
			var mychar = document.getElementsByClassName("reply2");
			mychar[index].style.display="none";
		}
		function show(obj)  
		{ 
			var tmp=document.getElementsByName("reply1");
			var index;
			for(var i=0;i<tmp.length;i++)
				if(obj==tmp[i])
					index=i;
			var mychar = document.getElementsByClassName("reply2");
			mychar[index].style.display="block";  	
		}	
    </script> 
</head>
<body style="margin:20px auto;margin-left:40px">
	<audio autoplay="autoplay" loop="-1" height="100" width="100">
		<source src="music/乱红.mp3" type="audio/mp3">
	</audio>
	<div style="margin:20px auto">
		<form action="messageHandle.php" class="form-inline" method="post">
		标题：<input  class="form-control" style="margin-left:21px" name="title" type="text" size="30"/><br/><br/>
		内容：<textarea  class="form-control" style="margin-left:21px" name="content" rows="5" cols="25"></textarea><br/><br/>
		<table>
			<td>
				<tr><input style="margin-left:80px" type="submit" name="submit" value="添加留言" class="button" /></form></tr>
				<tr>&nbsp;&nbsp;<input type="reset" name="reset" value="重置" class="button" /></tr>
				<tr><form class="form-inline" role="form" action="login.php" method="post" width="30px">
               		&nbsp;&nbsp;<input type="submit" name="submit" value="退出" class="button"/></form></tr>
			</td>
		</table>
	</div>	
	<?php
		$conn=mysql_connect('localhost','root','zyl19961020') or die('连接错误');
		mysql_select_db('elaine');
		mysql_query("set names utf8");
		$sql="select * from message";
		$query=mysql_query($sql);
		while ($rs=mysql_fetch_array($query)) {	
	?>
	<p>
		<span style="color:#48494C">
			<b><?php echo $rs['id']; ?>楼</b>&nbsp;|
			<b>用户：</b><?php echo $rs['name']; ?>&nbsp;|
			<b>时间：</b><?php echo $rs['date']; ?><br/>
			<b>留言标题：&nbsp;&nbsp;</b><?php echo $rs['title']; ?><br/>
			<b>留言内容：&nbsp;&nbsp;</b><?php echo $rs['content']; ?><br/>
			<?php echo " <a href='reply.php?id=".$rs["id"]."'>回复</a>"?>
			&nbsp;&nbsp;<input type="submit" name="reply1" value="查看回复" onclick="show(this)" class="button">
			<div class="reply2" style="display:none">
			<?php
				$id=$rs["id"];
				$sql1="select * from reply where new_id=$id";
				$query1=mysql_query($sql1);
				while ($rs1=mysql_fetch_array($query1)) {
					echo $rs1['rname']."回复了".$rs['name']."&nbsp;|时间：".$rs1['rdate']."<br/>";
					echo "<b>回复内容：&nbsp;&nbsp;</b>".$rs1['rcontent']."<br/><br/>";
				}			
			?>
			<tr>
				<form class="form-inline" action="message.php">
				<input style="gloat:right" type="submit" name="cancel" value="取消" onclick="hide(this)" class="button" /></form>			
			</div>
		</span>
	</p>
	<?php
		}
	?>
</body>
</html>