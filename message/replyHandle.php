<?php
	if ($_POST['rcontent']!="") {
		$rname=$_SESSION['name'];
		$rcontent=$_POST['rcontent'];
		$rdate=date('Y-m-d H:i:s');
		$id=$_GET['id'];
		$conn=mysql_connect('localhost','root','zyl19961020') or die('连接错误');
		mysql_select_db('elaine');
		mysql_query("set names utf8");
		date_default_timezone_set('PRC');
		$rdate=date('Y-m-d H:i:s');
		$sql="insert into reply(rname,rcontent,rdate,reply,new_id) values('".$rname."','".$rcontent."','".$rdate."',1,'".$id."')";
		if (mysql_query($sql)) {
			echo "<script type=\"text/javascript\">";
			echo "alert(\"添加回复成功！\");";
			echo "location.href=\"message.php\"";
			echo "</script>";
		}else{
			echo "<script type=\"text/javascript\">";
			echo "alert(\"添加回复失败！\");";
			echo "location.href=\"message.php?id=".$rs["id"]."\"";
			echo "</script>";
		}
	}else{
		echo "<script type=\"text/javascript\">";
		echo "alert(\"回复内容不能为空！\");";
		echo "location.href=\"message.php\"";
		echo "</script>";
	}	
?>   