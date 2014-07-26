<?php
//include("../nicePaging.php");
//$paging = new nicePaging;

class messages extends nicePaging{
    
    var $msg_id;
    var $sender;
    var $subject;
    var $text;
    var $msg_date;
    var $to;
    var $from;
    var $status = 0;
    
    public function _construct(){
        $this->msg_id = $msg_id;
        $this->sender = $sender;
        $this->subject = $subject;
        $this->text = $text;
        $this->msg_date = $msg_date;
        $this->to = $to;
        $this->from = $from;
        $this->status =$status;
        
    }
    
    
    public function get_msg_id(){
        
        return $this->msd_id;
        
    }
     public function get_sender(){
         
         return $this->msd_id;
    }
     public function get_subject(){
         
         return $this->msd_id;
    }
     public function get_text(){
         
         return $this->msd_id;
    }
     public function get_msg_date(){
         
         return $this->msd_id;
    }
     public function get_to(){
         
         return $this->msd_id;
    }
     public function get_from(){
         
         return $this->msd_id;
    }
     public function get_status(){
         
         return $this->msd_id;
    }
    
    public function send_message(){
        
        return mysql_query( " insert into message values( 0, '$this->sender', '$this->subject', '$this->text', NOW(), '$this->to', '$this->from', '$this->status' ,0) " );
        
    }
    
     public function read_message(){
        
        return mysql_query( " update message set status = 2 where msg_id = '$this->msg_id' " );
        
    }
    
    public function delete_message(){
        
       return mysql_query( " update message set status = 2 where msg_id = '$this->msg_id' " );
    }
    
    public function all_messages(){
        
          $rowsPerPage = 10;
          return $paging->pagerQuery("SELECT * FROM  `message` WHERE  `to` = '$this->to' ORDER BY msg_id DESC", $rowsPerPage);
    }
    

}
?>