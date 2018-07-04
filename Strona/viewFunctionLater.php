<?php
	$dirPath=$_REQUEST["q"];
	$files = scandir($dirPath);
	$htmlView = "";
	$arrlength = count($files);
	for($i=2;$i<$arrlength;$i++)
	{
		$htmlView .="
			<tr>
				<td>".$files[$i]."</td>
				<td></td>
				<td></td>
			</tr>";
	}
   echo $htmlView;  
?>