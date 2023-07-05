<?php
// print_r($_POST); die;
			if (isset($_POST['logout']))
			{
                session_start();
				session_destroy();
				header("Location: ../pages/login.php");
			}
			?>