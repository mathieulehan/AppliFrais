<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('frais_montant'))
{
	function site_url($uri = '')
	{
		$CI =& get_instance();
		return $CI->config->site_url($uri);
	}
}