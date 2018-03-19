<?php
  class PagesController {
    public function home() {
	include('models/lang.php');
	include('views/posts/head.php');
      require_once('views/pages/home.php');
	  	include('views/posts/foot.php');
    }
	
    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>