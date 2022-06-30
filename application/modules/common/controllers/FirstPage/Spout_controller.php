<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
require_once(APPPATH . 'libraries/Spout/Autoloader/autoload.php');
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class Spout_controller extends MX_Controller
{
    public function __construct() {
        parent::__construct ();    
        $this->load->model('Customer_Model');
    }

    public function xlxs(){
  
        $aData = $this->Customer_Model->FSaMCSTList($tSearch);
        $writer = WriterEntityFactory::createXLSXWriter();
        // $writer = WriterEntityFactory::createODSWriter();
        // $writer = WriterEntityFactory::createCSVWriter();

        $fileName = 'text.xlxs';
        // $writer->openToFile($filePath); // write data to a file or to a PHP stream
        $writer->openToBrowser($fileName); // stream data directly to the browser

        $cells = [
            WriterEntityFactory::createCell('ลำดับ'),
            WriterEntityFactory::createCell('ชื่อ'),
            WriterEntityFactory::createCell('นามสกุล'),
            WriterEntityFactory::createCell('ที่อยู่'),
            WriterEntityFactory::createCell('อีเมล'),
            WriterEntityFactory::createCell('แผนก'),
        ];

        /** add a row at a time */
        $singleRow = WriterEntityFactory::createRow($cells);
        $writer->addRow($singleRow);

        

        /** add multiple rows at a time */
        $multipleRows = [
            WriterEntityFactory::createRow($cells),
            WriterEntityFactory::createRow($cells),
        ];
        $writer->addRows($multipleRows); 

        $writer->close();
    }


}