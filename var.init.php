<?php
  /**
   * Faire l'assignation des variables POST et SESSION ici avec les isset() ou !empty()
   */
   
   
	if(empty($_GET['request']))	{
		$_GET['request'] = '';
	}

    if(empty($_SESSION['user_id'])){
        $_SESSION['user_id'] = 0;
    }
   
?>