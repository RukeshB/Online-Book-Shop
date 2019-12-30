<?php 
	function redirect($path)
	{
		return header('location:'.$path);
	}

	function redirection($path)
	{
		echo '<script>window.location.href="'.$path.'";</script>';
	}

	function alerts_message($type,$msg)
	{
		if($type == 'success')
		{
			$_SESSION['msg']="$.Notification.autoHideNotify('success', 'top right', 'I will be closed in 5 seconds...','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.')";
		}

		else if ($type == 'error')
		{
			$_SESSION['msg']='<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"> X
			</button><i class="icon-ok green"></i>Error !!! '.$msg.'</div>"';
		}

		else if ($type=='warning')
		{
			$_SESSION['msg']='<div class="alert alert-warning no-border">
										<button type="button" class="close" data-dismiss="alert"><span>&times;
										</span><span class="sr-only">Close</span></button>
										<span class="text-semibold">Warning!</span>'.$msg.'.
								    </div>';
		}
	}

	function displayMsg()
{
	if(isset($_SESSION['showmsg'])) echo $_SESSION['showmsg']; unset($_SESSION['showmsg']);
}
 ?>