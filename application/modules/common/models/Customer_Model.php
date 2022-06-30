<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Customer_Model extends MX_Controller {

    public function __construct() {
        parent::__construct ();    
    }

    //Functionality : Get data from table TXXMCustomer_infor
    //Parameters : $tSearch
    //Creator :  23/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return : $query
    //Return Type : array

    public function FSaMCSTList($tSearch){
      try {
            $this->db->trans_begin();
            $this->db->select('*');
            $this->db->from('VCN_CustomerInfor');
            if($tSearch != ''){
              $this->db->like('FTCusName',$tSearch);
            }
        
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                $query = $this->db->get();
                return $query->result_array();            
              }
            
          } catch (Exception $Error) {
            return $Error;
          }
      }



    //Functionality : Get data from table TXXMCustomer_infor
    //Parameters : $aData
    //Creator :  23/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return : Boolean
    //Return Type : Boolean 

    public function FSbMCSTPInsert($paData) {    
      try{
          $this->db->trans_begin();
          $this->db->insert('TCNMCustomer', $paData);

          if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
          } else {
            $this->db->trans_commit();
            return true;
          } 

        }catch (Exception $Error) {
          return $Error;
        }
      }

    //Functionality : Get data from id TXXMCustomer_infor
    //Parameters : $id
    //Creator :  23/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return : $query
    //Return Type : array

    public function FSaMCSTPGetdataid($pnId) {
      try{
        $this->db->trans_begin();
        $this->db->select('*');
        $this->db->from('VCN_CustomerInfor');
        $this->db->where('FNCusId', $pnId);
      
        if ($this->db->trans_status() === FALSE) {
          $this->db->trans_rollback();
          return false;
        } else {
          $this->db->trans_commit();
          $query = $this->db->get();
        return $query->result_array();
        } 

      }catch (Exception $Error) {
        return $Error;
      }     
    }

    

    //Functionality : Update data
    //Parameters : $editData, $id
    //Creator :  23/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return : Boolean				
    //Return Type : Boolean

    public function FSbMCSTPUpdate($paEditData, $pnId) {
      try{
        $this->db->trans_begin();
      $this->db->where('FNCusId', $pnId);
      $this->db->update('TCNMCustomer', $paEditData);
      
      //  echo $this->db->last_query();
        
        if ($this->db->trans_status() === FALSE) {
          $this->db->trans_rollback();
          return false;
        } else {
          $this->db->trans_commit();
          return true;
        } 

      }catch (Exception $Error) {
        return $Error;
      }
    }

    //Functionality : Delete data
    //Parameters : $id
    //Creator :  24/05/2022 Nakit
    //Last Modified : 25/05/2022 Nakit
    //Return : Boolean
    //Return Type : Boolean

    public function FSbMCSTPDelete($pnId){
      try{
        $this->db->trans_begin();
        $this->db->delete('TCNMCustomer', array('FNCusId' => $pnId));

        if ($this->db->trans_status() === FALSE) {
          $this->db->trans_rollback();
          return false;
        } else {
          $this->db->trans_commit();
          return true;
        } 

      }catch (Exception $Error) {
        return $Error;
      }

    }

    //Functionality : Get salary from TXXMSalary
    //Parameters : $id
    //Creator :  28/05/2022 Nakit
    //Last Modified : 30/05/2022 Nakit
    //Return : $query
    //Return Type : array

    public function FSaMCSTPGetsalary($pnId){
      try{
        $this->db->trans_begin();
        $this->db->select('*');
        $this->db->from('TCNMSalary');
        $this->db->join('TCNMCustomer', 'TCNMSalary.id_c = TCNMCustomer.FNCusId', 'left');
        $this->db->join('TCNMDepartment', 'TCNMCustomer.FTDepId = TCNMDepartment.FTDepId', 'left');
        $this->db->join('TCNMMonth', 'TCNMSalary.id_m = TCNMMonth.id', 'left');
        $this->db->where('TCNMCustomer.FNCusId', $pnId);
        $query = $this->db->get();    
        return $query->result_array();

        if ($this->db->trans_status() === FALSE) {
          $this->db->trans_rollback();
          return false;
        } else {
          $this->db->trans_commit();
          return true;
        } 

      }catch (Exception $Error) {
        return $Error;
      }
    }
}

