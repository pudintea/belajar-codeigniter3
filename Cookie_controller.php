<?php 
   class Cookie_controller extends CI_Controller { 
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('cookie', 'url')); 
      } 
  
      public function index() { 
         set_cookie('cookie_name','cookie_value','3600'); 
         $this->load->view('Cookie_view'); 
      } 
  
      public function display_cookie() { 
         echo get_cookie('cookie_name');
        //melihat cookie juga
        echo $this->input->cookie('cookie_name', TRUE);
         $this->load->view('Cookie_view');
      } 
  
      public function deletecookie() { 
         delete_cookie('cookie_name'); 
         redirect('cookie/display'); 
      } 
		
   } 
?>
/*
<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>CodeIgniter View Example</title> 
   </head> 
	
   <body> 
      <a href = 'display'>Click Here</a> to view the cookie.<br> 
      <a href = 'delete'>Click Here</a> to delete the cookie. 
   </body>
	
</html>
*/
