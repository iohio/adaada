<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Spout_Model extends MX_Controller {

    public function __construct() {
        parent::__construct ();    
    }

    public function FSaMCSTList($tSearch){
        try {
              $this->db->trans_begin();
              $this->db->select('*');
              $this->db->from('TXXMCustomer_infor');
              if($tSearch != ''){
                $this->db->like('name',$tSearch);
              }
              $query = $this->db->get();
              return $query->result_array();
  
              if ($this->db->trans_status() === FALSE) {
                  $this->db->trans_rollback();
                  return false;
              } else {
                  $this->db->trans_commit();
                  return true;
              }
              
            } catch (Exception $Error) {
              
            }
        }

}