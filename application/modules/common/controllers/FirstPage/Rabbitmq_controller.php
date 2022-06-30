<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'libraries/rabbitmq/vendor/autoload.php');
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Rabbitmq_controller extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //Functionality : Add Queue to RabbitMQ
    //Parameters : 
    //Creator :  04/06/2022 Nakit
    //Last Modified : 05/06/2022 Nakit
    //Return : 
    //Return Type : 
    public function FCNxCRBCSentQueue()
    {
        $oConnection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest', 'testrabbit');

        $tQueueName = 'Quererabbit2';
        $aarray = array('id'=>'3','name'=>'test3');
        $oChannel = $oConnection->channel(); //เรียก Channel (ประกาศใช้)
        $oChannel->queue_declare($tQueueName, false, true, false, false); //ประกาศคิวรอไว้ ชื่อ/ประเภท/
        $oMessage = new AMQPMessage(json_encode($aarray)); //สร้างข้อความ
        $oChannel->basic_publish($oMessage, "", $tQueueName); //นำข้อความเข้าคิว

        $oChannel->close();
        $oConnection->close();
        
        redirect('','refresh');
        
    }

    //Functionality : Delete Queue in RabbitMQ
    //Parameters : 
    //Creator :  04/06/2022 Nakit
    //Last Modified : 05/06/2022 Nakit
    //Return : 
    //Return Type :  
    public function FCNxCRBCDeleteQueue()
    {
        $tQueueName = 'Quererabbit2';
        $oConnection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest', 'testrabbit');  
        $oChannel = $oConnection->channel();
        $oChannel->queue_delete($tQueueName); //ลบคิว

        $oChannel->close();
        $oConnection->close();

        redirect('','refresh');
    }

    //Functionality : Get Queue in RabbitMQ
    //Parameters : 
    //Creator :  04/06/2022 Nakit
    //Last Modified : 05/06/2022 Nakit
    //Return : 
    //Return Type : 
    public function FCNxCRBCGetQueue()
    {
        $tQname = 'Quererabbit2';
        $oConnection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest', 'testrabbit');
        $ochannel = $oConnection->channel();
        $ochannel->queue_declare($tQname, false, true, false, false);
        $omessage = $ochannel->basic_get($tQname); //เอา obj ของคิวออกมา
        $omassage = $omessage->body; //เอาข้อความ
        $ochannel->basic_ack($omessage->delivery_info['delivery_tag']); //ลบ message
        $ochannel->close();
        $oConnection->close();
        $aJson= json_decode($omassage);
        print_r($aJson);
    
    }
}
