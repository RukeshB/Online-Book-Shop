<?php 
	class file
	{
		function uploadphoto($file)
		{
			$uploadFolder = "uploadImage";
			$fileName = $file['name'];
			$sourceLocation = $file['tmp_name'];
			$temp = explode('.',$fileName);
			$extn = strtolower($temp[1]);
			if($extn == "jpg" || $extn == "png")
			{
				$random = md5(time()."_".time().rand(0000,9999));
				$fileNewName = $temp[0]."_".$random.".".$temp[1];
				if(!is_dir($uploadFolder))
				{
					mkdir($uploadFolder,777);
				}

				$destinationLocation = "../".$uploadFolder."/".$fileNewName;
				
				if(move_uploaded_file($sourceLocation, $destinationLocation))
					return $fileNewName;

				return false;
			}
		}
	}
 ?>