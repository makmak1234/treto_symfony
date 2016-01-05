<?php
session_start();
if(isset($_GET["filetxt"])){
	$restarr = "";
	$filetxt = $_GET["filetxt"];
	$dir = './tmptxt';
	if(isset($_SESSION["tmpfname"])){
		$tmpfname = $_SESSION["tmpfname"];
	}
	else $tmpfname = tempnam("$dir", "tmp");//создать файл
	$_SESSION["tmpfname"] = $tmpfname;
	$handle = file("$filetxt", FILE_IGNORE_NEW_LINES);//загрузка путей картинок из txt файла в перем
	$i = 0;
	$nameall = file_get_contents("$tmpfname");//считать имена картинок из файла
	$foptmp = fopen("$tmpfname", "ab");//открыть для записи в конец
	$src = imagecreatefrompng("./elem/55728fa6267b8_wather_150.png");//водяной знак
	foreach($handle as $k=>$v){
		//if(@fopen($v, "r")){ //проверить sv на существование файла   // если убрать будут картинки с удаленного
			$rest = strrchr($v, "/");
			$rest = substr($rest, 1);
			$rest = rawurldecode("$rest");//убрать%
			$pos = strpos($nameall, $rest);
			if($pos === false){
				$fnamew = "./imagesw/" . $rest;
					$v = "./images/" . $rest;   // если убрать будут картинки с удаленного
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
		//}   // если убрать будут картинки с удаленного
	}
	imagedestroy($src);
	fclose($foptmp);
	clearstatcache();//очистить кеш
	$reply = json_encode($restarr, 256);
	echo("$reply");
}
?>