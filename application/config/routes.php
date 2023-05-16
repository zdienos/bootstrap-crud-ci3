<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] 	= 'phonebook';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;


$route['simpan'] 	= 'phonebook/simpan';
$route['add'] 		= 'phonebook/add';
$route['listview']  = 'phonebook/listview';
$route['get_by_id'] = 'phonebook/get_by_id';
$route['hapus']     = 'phonebook/hapus';


