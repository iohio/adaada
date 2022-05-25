<?php defined ('BASEPATH') or exit ( 'No direct script access allowed' );

$route['default_controller'] = 'common/FirstPage/Customer_controller/FCNxCCSTList';
$route['masPDTPageAdd']  = 'common/FirstPage/Customer_controller/FSxCCSTAddData';
$route['masPDTEvenDelete/(:num)']  = 'common/FirstPage/Customer_controller/FSxCCSTDelete/$1';
$route['masPDTPageEdit/(:num)']  = 'common/FirstPage/Customer_controller/FSxCCSTEditData/$1';
$route['masPDTEvensearch'] = 'common/FirstPage/Customer_controller/FCNxCCSTList';
$route['masPDTPageSalary/(:num)'] = 'common/FirstPage/Customer_controller/FSxCCSTSaraly/$1';

