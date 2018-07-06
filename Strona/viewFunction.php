<?php
// function 
function viewFolder($dirPath) {
	$files = scandir($dirPath);
	$htmlView = "";
	$symbol="/";
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
				<td width='60%'>".$mainName."</td>
				<td width='20%'>".$typ."".$extension."</td>
				<td width='20%'>".$size."</td>
			</tr>";
		
	}
   return $htmlView;
}  
?>