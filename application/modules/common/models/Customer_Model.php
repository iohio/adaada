<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Customer_Model extends MX_Controller {

    public function __construct() {
        parent::__construct ();    
    }

    public function FSxMCSTList($tSearch)
    {

      $this->db->select('*');
      $this->db->from('TXXMCustomer_infor');
      if($tSearch != ''){
        $this->db->like('name',$tSearch);
      }
      $query = $this->db->get();
      return $query->result_array();
    }

    public function FSxMCSTProvince()
    {
      $this->db->select('pname');
      $this->db->from('province');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function FSxMCSTPInsert($aData) {    
      if ($this->db->insert('TXXMCustomer', $aData)) {
        return true;
      } else {
        return false;
      }
    }

    public function FSxMCSTPGetdataid($id) {
      $this->db->select('*');
      $this->db->from('TXXMCustomer_infor');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function FSxMCSTPUpdate($editData, $id) {
      $this->db->where('id', $id);

      if ($this->db->update('TXXMCustomer', $editData)) {
          return true;
      } else {
          return false;
      }
    }

    public function FSxMCSTPDelete($id){
      if ($this->db->delete('TXXMCustomer', array('id' => $id))) {
        return true;
      } else {
        return false;
      }
    }

    public function FSxMCSTPGetsalary($id){
      $this->db->select('*');
      $this->db->from('TXXMSalary');
      $this->db->join('TXXMCustomer', 'TXXMSalary.id_c = TXXMCustomer.id', 'left');
      $this->db->join('TXXMDepartment', 'TXXMCustomer.d_code = TXXMDepartment.d_code', 'left');
      $this->db->join('TXXMMonth', 'TXXMSalary.id_m = TXXMMonth.id', 'left');
      $this->db->where('TXXMCustomer.id', $id);
      $query = $this->db->get();    
      return $query->result_array();
    }



}

