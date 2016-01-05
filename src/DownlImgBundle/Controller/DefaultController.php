<?php

namespace DownlImgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //return $this->render('DownlImgBundle:Default:index.html.twig', array('name' => $name));
        return $this->render('DownlImgBundle:Default:index.html.twig');
    }
    
    public function inputtxtAction()
    {
        //return $this->render('DownlImgBundle:Default:index.html.twig', array('name' => $name));
        return $this->render('DownlImgBundle:Default:inputtxt.html.twig', array('myscript' => ''));
    }
    
    public function uploadtxtAction()
    {
        if(isset ( $_SESSION['on_off'] ) && !isset($_GET["_SESSION['on_off']"])) session_start();
	//require_once 'inputtxt.html';
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
		$upfile_name = "tmptxt/" . $myfile_name;//"tmptxt/" . //$dir . basename($myfile_fit) . $tm . $ext;
		$tm = time() . rand(10,100);
		$upfile_name = substr_replace($upfile_name, "", (strlen($upfile_name) - 4));
		$upfile_name .= $tm . ".txt";
		copy($myfile, $upfile_name);
		$_SESSION["filetxt"] = $upfile_name;
			//echo <<<END
			//$myscript = "window.parent.uploadstart($upfile_name)";
			$myscript = $upfile_name;
//END;
		return $this->render('DownlImgBundle:Default:inputtxt.html.twig', array('myscript' => $myscript));
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

    public function ajaxtxtAction()
    {
        $request = $this->getRequest();
        $filetxt = $request->query->get('filetxt');

  //      if(isset($_GET["filetxt"])){
	$restarr = "";
	//$filetxt = $_GET["filetxt"];
	$dir = 'tmptxt/';//'./tmptxt';
	if(isset($_SESSION["tmpfname"])){
		$tmpfname = $_SESSION["tmpfname"];
	}
	else $tmpfname = tempnam("$dir", "tmp");//создать файл
	$_SESSION["tmpfname"] = $tmpfname;
	$handle = file("$filetxt", FILE_IGNORE_NEW_LINES);//загрузка путей картинок из txt файла в перем
	$i = 0;
	$nameall = file_get_contents("$tmpfname");//считать имена картинок из файла
	$foptmp = fopen("$tmpfname", "ab");//открыть для записи в конец
	$src = imagecreatefrompng("elem/55728fa6267b8_wather_150.png");//водяной знак
	foreach($handle as $k=>$v){
		$rest = strrchr($v, "/");// если убрать будут картинки с удаленного
		$rest = substr($rest, 1);// если убрать будут картинки с удаленного
		$rest = rawurldecode("$rest");//убрать%// если убрать будут картинки с удаленного
		$v = "images/" . $rest;   // если убрать будут картинки с удаленного
		if(@fopen($v, "r")){ //проверить sv на существование файла  
			//$rest = strrchr($v, "/"); // если убрать будут картинки с удаленного
			//$rest = substr($rest, 1); // если убрать будут картинки с удаленного
			//$rest = rawurldecode("$rest");//убрать% // если убрать будут картинки с удаленного
			$pos = strpos($nameall, $rest);
			if($pos === false){
				$fnamew = "imagesw/" . $rest;
				$dest = imagecreatefromjpeg("$v");
				// Копирование и наложение
				$wsrc = imagesx($src);
				$hsrc = imagesy($src);
				$wdest = imagesx($dest);
				$hdest = imagesy($dest);
				imagecopy ($dest, $src, $wdest-$wsrc-40, $hdest-$hsrc, 0, 0, $wsrc, $hsrc);
				imagepng($dest, $fnamew);
				imagedestroy($dest);
				$restarr[] = array($rest, ceil($wdest*200/$hdest));
				fwrite($foptmp, $restarr[$i][0] . PHP_EOL);
				/*echo <<<END
				<img src="$fnamew">
	END;*/
				$i++;
			}
		}   
	}
	imagedestroy($src);
	fclose($foptmp);
	clearstatcache();//очистить кеш
	$reply = json_encode($restarr, 256);
	//echo ("Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello ");//("$reply");
//}

        //return new Response($filetxt);
        return new Response($reply);
    }

}
						
