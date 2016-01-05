<?php
	session_start();
	require_once 'inputtxt.html';
	if(isset($_FILES['filetxt'])){
		$myfile = $_FILES["filetxt"]["tmp_name"]; 
		$myfile_name = $_FILES["filetxt"]["name"]; 
		$myfile_size = $_FILES["filetxt"]["size"]; 
		$myfile_type = $_FILES["filetxt"]["type"]; 
		$error_flag = $_FILES["filetxt"]["error"];

		// копируем
		if(isset($_SESSION["filetxt"])){
			$filetxt = $_SESSION["filetxt"];
			unlink("$filetxt");
		}
		$upfile_name = "./tmptxt/" . $myfile_name;//$dir . basename($myfile_fit) . $tm . $ext;
		$tm = time() . rand(10,100);
		$upfile_name = substr_replace($upfile_name, "", (strlen($upfile_name) - 4));
		$upfile_name .= $tm . ".txt";
		copy($myfile, $upfile_name);
		$_SESSION["filetxt"] = $upfile_name;
			echo <<<END
			<script>
				window.parent.uploadstart("$upfile_name");	
			</script>
END;
	}
	
	if(isset($_GET["deltxt"])){//удаление временных файлов
		if(isset($_SESSION["filetxt"])){
			$filetxt = $_SESSION["filetxt"];
			unlink("$filetxt");
		}
		if(isset($_SESSION["tmpfname"])){
			$tmpfname = $_SESSION["tmpfname"];
			$foptmp = file("$tmpfname", FILE_IGNORE_NEW_LINES);// прочитать файл в массив
			foreach($foptmp  as  $k=>$v){
				$fn = "./imagesw/" . "$v";
				unlink("$fn");
			}
			unlink("$tmpfname");
		}
		destroy_session_and_data();
	}
	
	function destroy_session_and_data()
	{
		unset($_GET, $_POST);
		$_SESSION = array();
		if (session_id() != "" || isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time() - 2592000, '/');
		}
		session_destroy();
	}
	
?>