<?php
	session_start();

	$dirPath=$_REQUEST["q"];
	$files = scandir($dirPath);
	$_SESSION['startDirection']=$dirPath;
	$symbol="/";
	$htmlView = "";
	$arrlength = count($files);
	for($i=2;$i<$arrlength;$i++)
	{
		$parts = explode(".", $files[$i]);
		if (is_array($parts) && count($parts) > 1)
		{	
			$mainName = current($parts);
			$extension = end($parts);
			$extension = strtoupper($extension);
			$typ = "Plik ";
			$pathToFile=$dirPath.$symbol.$files[$i];
			$size = round(filesize($pathToFile)/1024);
			$size = $size." KB";
		}
		else
		{
			$mainName=$files[$i];
			$extension ="";
			$typ = "Folder";
			$size = "";
		}
		$htmlView .="
			<tr>
				<td>".$mainName."</td>
				<td>".$typ."".$extension."</td>
				<td>".$size."</td>
			</tr>";
	}
   echo $htmlView;  
?>