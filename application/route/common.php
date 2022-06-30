<?php defined ('BASEPATH') or exit ( 'No direct script access allowed' );

//Customer Controller
$route['default_controller'] = 'common/FirstPage/Customer_controller/FStCCSTList';
$route['masEMPPageAdd']  = 'common/FirstPage/Customer_controller/FSxCCSTAddData';
$route['masEMPEvenDelete/(:num)']  = 'common/FirstPage/Customer_controller/FSxCCSTDelete/$1';
$route['masEMPPageEdit/(:num)']  = 'common/FirstPage/Customer_controller/FSxCCSTEditData/$1';
$route['masEMPEvensearch'] = 'common/FirstPage/Customer_controller/FStCCSTList';
$route['masEMPPageSalary/(:num)'] = 'common/FirstPage/Customer_controller/FSxCCSTSaraly/$1';
$route['masEMPEvenReport'] = 'common/FirstPage/Customer_controller/FSxCCSTExport';
$route['masEMPPageApi'] = 'common/FirstPage/Customer_controller/FSxCCSTGetapi';

//Rabbit Controller
$route['masRBCEventAddQueue'] = 'common/FirstPage/Rabbitmq_controller/FCNxCRBCSentQueue';
$route['masRBCEventDelQueue'] = 'common/FirstPage/Rabbitmq_controller/FCNxCRBCDeleteQueue';
$route['masRBCEventGetQueue'] = 'common/FirstPage/Rabbitmq_controller/FCNxCRBCGetQueue';

//Spout Controller
$route['masRBCEvenExport'] = 'common/FirstPage/Spout_controller/xlxs';

//PDF Controller
$route['masPDFEvenpdf'] = 'common/FirstPage/Customer_controller/FSxCCSTExportPDF';

