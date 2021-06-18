<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function pdn_load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{
			$this->CI =& get_instance();
			$this->set('konten', $this->CI->load->view($view, $view_data, TRUE));
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		
		function pdn_kode($view = '' , $view_data = array(), $return = FALSE)
		{
			$this->CI =& get_instance();
			$this->set('kode', $this->CI->load->view($view, $view_data, TRUE));
			return $this->CI->load->view($view, $this->template_data, $return);
		}
}
/*
*
*$this->load->library(array('template')); load library template
*$this->template->pdn_load('tem','konten'); menampilkan file konten.php yang ada di folder view dan ditampilkan kedalam file template utama
*$this->template->pdn_kode('kode'); menampilkan file kode.php yang ada di folder view dan ditampilkan kedalam file template utama
*
* TEMPLATE HTML (Tampilkan)
* isset($konten) ? $konten : '';
* isset($kode) ? $kode : '';
*
* https://t.me/pudin_ira
* https://instagram.com/pudin.ira
/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
