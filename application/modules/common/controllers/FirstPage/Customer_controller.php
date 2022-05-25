<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Customer_controller extends MX_Controller {

    public function __construct() {
        parent::__construct (); 
        
        //session set lang
        $this->session->set_userdata ("lang", 'TH');
        $this->load->model('Customer_Model');
        $this->load->library('session');
        
    }

    /*
    * Functionality : Get System Configuration
    * Parameters : $paAppCode, $paConfigGroupCode
    * Creator : 5/3/2019 piya(tiger)
    * Last Modified : -
    * Return : Configuration List
    * Return Type : array
    */

	public function FCNxCCSTList() {
        $tSearch = $this->input->post('search');
        $aData['aUser'] = $this->Customer_Model->FSxMCSTList($tSearch);
        $vData = $this->load->view('common/FirstPage/wMenu', $aData); 
        $aReturnData = array(
            'tViewDataTable' => $vData,
            'nStaEvent' => '1',
            'tStaMessg' => 'Success'
        );
    }


    public function FSxCCSTAddData() {
            $config['upload_path'] = './img/';
            $config['allowed_types'] = 'png|jpg';
            $config['max_size'] = '2000';
            $config['max_width'] = '2500';
            $config['max_height'] = '2500';
            $this->load->library('upload', $config);
            $this->upload->do_upload('oflPic');
        if($this->input->post('osmAdd')){
        $aData = $this->upload->data();
        $filename = $aData['file_name'];  
        $name = $this->input->post('oetFname');
        $lastn = $this->input->post('oetLname');
        $address = $this->input->post('oetAddress');
        $email = $this->input->post('oetEmail');
        $depart = $this->input->post('ocmDepart');
        $aData = array(
              'name' =>$name,
              'lastn' =>$lastn,
              'address' =>$address,
              'email' =>$email,
              'd_code' =>$depart,
              'pic_name' =>$filename
        );
        $insert = $this->Customer_Model->FSxMCSTPInsert($aData);
        if ($insert) {
            redirect('');
             }
        }

        $this->load->view('common/FirstPage/wAdd');
    }

    public function FSxCCSTEditData($id) {
        $aData['aUser'] = $this->Customer_Model->FSxMCSTPGetdataid($id);
        if ($this->input->post('osmEdit')) {
        $name = $this->input->post('oetFname');
        $lastn = $this->input->post('oetLname');
        $address = $this->input->post('oetAddress');
        $email = $this->input->post('oetEmail');
        $depart = $this->input->post('ocmDepart');
        $aEditdata = array(
              'name' =>$name,
              'lastn' =>$lastn,
              'address' =>$address,
              'email' =>$email,
              'd_code' =>$depart
        );
            $update = $this->Customer_Model->FSxMCSTPUpdate($aEditdata, $id);
            if ($update) {
                redirect('');
            }
        }
        $this->load->view('common/FirstPage/wEdit', $aData);
    }

    public function FSxCCSTDelete($id) {
        $delete = $this->Customer_Model->FSxMCSTPDelete($id);
        if ($delete) {
            redirect('');
        }
    }

    public function FSxCCSTSaraly($id){
        $aData['aUser'] = $this->Customer_Model->FSxMCSTPGetsalary($id);
        $this->load->view('common/FirstPage/wSalary', $aData);      
    }

}

