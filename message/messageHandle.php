<?php
	if ($_POST['title']!=""&&$_POST['content']!="") {
		$title=$_POST['title'];
		$content=$_POST['content'];
		date_default_timezone_set('PRC'); 
		$date=date('Y-m-d H:i:s');
		$conn=mysql_connect('localhost','root','zyl19961020') or die('连接错误');
		mysql_select_db('elaine');
		mysql_query("set names utf8");
		$sql="insert into message(name,title,content,date) values('".$_SESSION['name']."','".$title."','".$content."','".$date."')";
		if (mysql_query($sql)) {
			echo "<script type=\"text/javascript\">";
			echo "alert(\"添加留言成功！\");";
			echo "location.href=\"message.php\"";
			echo "</script>";
		}else{
			echo "<script type=\"text/javascript\">";
			echo "alert(\"添加留言失败！\");";
			echo "location.href=\"message.php\"";
			echo "</script>";
		}
	}else{
		echo "<script type=\"text/javascript\">";
		echo "alert(\"标题和内容不能为空！\");";
		echo "location.href=\"message.php\"";
		echo "</script>";
	}	
?>   