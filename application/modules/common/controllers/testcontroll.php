<?php
public function FSaCCTSShowEmptyRoom(){
    $dDate1 = $this->input->post('odpGoday');
    $dDate2 = $this->input->post('odpBackday');
    $nPeople = $this->input->post('onbPeople');
    $aBooking = array(
        'date1' => $dDate1,
        'date2' => $dDate2,
        'totalP' => $nPeople
    );
    
    $this->Booking_model->FSaMCSTGetEmptyRoom($aBooking);
}

//Booking_Model

public function FSaMCSTGetEmptyRoom($paBooking){
    $this->db->select('FThtName,FThtCode');
    $this->db->from('TCNMBooking'); 
    $this->db->where('FDhtDate <=', $paBooking['date1']);
    $this->db->where('FDhtDate >=', $paBooking['date2']);
    $query = $this->db->get();
    return $query->result_array();
}