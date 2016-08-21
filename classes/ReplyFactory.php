<?php
class Reply{
    private $isValid;
    private $xml;
    
    public function __construct($status,$type,$message,$sessionID=''){
        
        $this->sessionID = $sessionID;
        $this->status = $status;
        $this->type = $type;
        $this->message = $message;
    }

    public function sendReply(){
        $this->xml='<?xml version="1.0" encoding="UTF-8"?>
        <response>
        <result>'.$this->status.'</result>
        <sessionid>'.$this->sessionID.'</sessionid>
        <errors>
        <errorCode>1</errorCode>
        <errorMessage>'.$this->message.'</errorMessage>
        </errors>
        <price>0</price>
        </response>';
        
        print $this->xml;
        exit;
    }
}

class ReplyFactory{
    public static function create($status,$type,$message,$sessionID){
        return new Reply($status,$type,$message,$sessionID);
    }
}
?>



