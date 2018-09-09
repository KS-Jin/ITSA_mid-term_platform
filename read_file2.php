		<?php
		
		$dirname="zips";
		$dh=opendir($dirname);
		while ($dave=readdir($dh)){

		if ($dave != "." && $dave != "..") { 
			$file_name = pathinfo($dave,PATHINFO_FILENAME);
			$file_name_ch = mb_convert_encoding($file_name, "UTF-8", "auto");
			$file_name_form = "<tr>.<td>".$file_name_ch;
			//echo $file_name_form;
			echo json_encode($file_name_form, JSON_UNESCAPED_UNICODE);

			//echo "<tr>"."<td>".$file_name."</td>"."</tr>"; //"br"讓名稱可以斷行排列出來，不會一直排下去
			} 
		}
		closedir ($dh);
		
		?>