<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Customer_controller extends MX_Controller {

    public function __construct() {
        parent::__construct (); 
        
        //session set lang
        FCNxGetLang();
        $this->load->model('Customer_Model');
        $this->load->library('session');
        $this->load->library('pdf');
    }

    //Functionality : Show list All
    //Parameters : 
    //Creator :  23/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return :  view
    //Return Type : text string

	public function FStCCSTList() {
        $tSearch = $this->input->post('search');
        $aData['aUser'] = $this->Customer_Model->FSaMCSTList($tSearch);
        $aData['language'] = $this->session->userdata('language');
        
        $this->load->view('common/FirstPage/wMenu', $aData); 
        // $aReturnData = array(
        //     'tViewDataTable' => $vData,
        //     'nStaEvent' => '1',
        //     'tStaMessg' => 'Success'
        // );
     }


    //Functionality : Add data
    //Parameters : 
    //Creator :  23/05/2022 Nakit
    //Last Modified : 02/06/2022 Nakit
    //Return : view
    //Return Type : text,string

    public function FSxCCSTAddData() {
            $tNew_name = time().".jpg";
            $config['upload_path'] = './img/';
            $config['allowed_types'] = 'png|jpg';
            $config['max_size'] = '2000';
            $config['max_width'] = '2500';
            $config['max_height'] = '2500';
            $config['file_name'] = $tNew_name;
            $this->load->library('upload', $config);
            $this->upload->do_upload('oflPic');
        if($this->input->post('osmAdd')){
        $aData = $this->upload->data(); 
        $tName = $this->input->post('oetFname');
        $tLastn = $this->input->post('oetLname');
        $tAddress = $this->input->post('oetAddress');
        $tEmail = $this->input->post('oetEmail');
        $tDepart = $this->input->post('ocmDepart');
        $aData = array(
              'FTCusName' =>$tName,
              'FTCusLastName' =>$tLastn,
              'FTCusAddress' =>$tAddress,
              'FTCusEmail' =>$tEmail,
              'FTDepId' =>$tDepart,
              'FTCusPic' =>$tNew_name
        );
        $insert = $this->Customer_Model->FSbMCSTPInsert($aData);
        if ($insert) {
            redirect('');
             }
        }

        $this->load->view('common/FirstPage/wAdd');
    }

    //Functionality : Get id for edit
    //Parameters : $id
    //Creator :  23/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return : view
    //Return Type : text,string

    public function FSxCCSTEditData($id) {
        $aData['aUser'] = $this->Customer_Model->FSaMCSTPGetdataid($id);
        if ($this->input->post('osmEdit')) {
        $tName = $this->input->post('oetFname');
        $tLastn = $this->input->post('oetLname');
        $tAddress = $this->input->post('oetAddress');
        $tEmail = $this->input->post('oetEmail');
        $tDepart = $this->input->post('ocmDepart');
        $aEditdata = array(
              'FTCusName' =>$tName,
              'FTCusLastName' =>$tLastn,
              'FTCusAddress' =>$tAddress,
              'FTCusEmail' =>$tEmail,
              'FTDepId' =>$tDepart
        );
        $update = $this->Customer_Model->FSbMCSTPUpdate($aEditdata, $id);
            if ($update) {
                redirect('');
            }
        }
        $this->load->view('common/FirstPage/wEdit', $aData);
    }

    //Functionality : Get id for delete
    //Parameters : $id
    //Creator :  23/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return : 
    //Return Type :

    public function FSxCCSTDelete($id) {
        $delete = $this->Customer_Model->FSbMCSTPDelete($id);
        if ($delete) {
            redirect('');
        }
    }

    //Functionality : Get Saraly
    //Parameters : $id
    //Creator :  23/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return : view
    //Return Type : text,string

    public function FSxCCSTSaraly($id){
        $aData['aUser'] = $this->Customer_Model->FSaMCSTPGetsalary($id);
        $this->load->view('common/FirstPage/wSalary', $aData);      
    }

    //Functionality : Export Execl
    //Parameters : 
    //Creator :  01/06/2022 Nakit
    //Last Modified : 02/06/2022 Nakit
    //Return : 
    //Return Type :

    public function FSxCCSTExport(){  
       $this->load->library('excel');  
       $oPHPExcel = new PHPExcel();
       $oPHPExcel->getProperties()->setCreator("Nakit")  
       ->setLastModifiedBy("Nakit")  
       ->setTitle("PHPExcel Test Document")  
       ->setSubject("PHPExcel Test Document")  
       ->setDescription("Test Export");
       $oPHPExcel->getActiveSheet()->setTitle('CustomerTest');
       $oPHPExcel->setActiveSheetIndex(0);
       $oPHPExcel->getDefaultStyle()  
       ->getAlignment()  
       ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)  
       ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
       $oPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
       $oPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
       $oPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);     
       $oPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);  
       $oPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30); 
       $oPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30); 
       
       $oPHPExcel->setActiveSheetIndex(0)  
                ->setCellValue('A1', 'ชื่อ')    
                ->setCellValue('B1', 'นามสกุล')  
                ->setCellValue('C1', 'ที่อยู่')  
                ->setCellValue('D1', 'อีเมล') 
                ->setCellValue('E1', 'แผนก');  

       $start_row=2;
       $tSearch = $this->input->post('search');
       $aData = $this->Customer_Model->FSaMCSTList($tSearch);
       if(count($aData)>0){
           foreach($aData as $aVal){
            $oPHPExcel->setActiveSheetIndex(0)  
            ->setCellValue('A'.$start_row, $aVal['FTCusName'])  
            ->setCellValue('B'.$start_row, $aVal['FTCusLastName'])  
            ->setCellValue('C'.$start_row, $aVal['FTCusAddress'])  
            ->setCellValue('D'.$start_row, $aVal['FTCusEmail'])
            ->setCellValue('E'.$start_row, $aVal['FTDepId']);
            $start_row++;
           }
           $oWriter = PHPExcel_IOFactory::createWriter($oPHPExcel, 'Excel2007');
           $filename='Product-'.date("dmYHi").'.xlsx';
           header('Content-Type: application/vnd.ms-excel');
           header('Content-Disposition: attachment;filename="'.$filename.'"');
           header('Cache-Control: max-age=0');
           ob_end_clean();
           $oWriter->save('php://output');
       }

    }

    //Functionality : Export PDF
    //Parameters : 
    //Creator :  08/06/2022 Nakit
    //Last Modified : 09/06/2022 Nakit
    //Return : view
    //Return Type : text,string

    public function FSxCCSTExportPDF(){
        $tSearch = $this->input->post('search');
        $aData['aUser'] = $this->Customer_Model->FSaMCSTList($tSearch);
        $this->load->view('common/FirstPage/vReport', $aData); 
    }

    //Functionality : test API
    //Parameters : 
    //Creator :  14/06/2022 Nakit
    //Last Modified : 14/06/2022 Nakit
    //Return : 
    //Return Type :

    public function FSxCCSTGetapi(){
        $oCurl = curl_init();

        curl_setopt_array($oCurl, array(
        CURLOPT_URL => 'http://localhost:4200/user',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_SSL_VERIFYPEER => FALSE,
            ));

        $oResponse = curl_exec($oCurl);
        $aJason['User'] = json_decode($oResponse,true);    
       
        curl_close($oCurl);
        // print_r($aJason);
        $this->load->view('common/FirstPage/wAPI',$aJason );
    }
}

