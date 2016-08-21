<?php
class Publishers{
    
    private $pubs = array(
        '123'=> array(
            'id' => '123',
            'name' => 'Publisher 123',
            'dist' => array('buyer A', 'buyer B'),
            'active' => 1
        ),
        '456'=> array(
            'id' => '456',
            'name' => 'Publisher 456',
            'dist' => array('buyer A'),
            'active' => 1
        ),
    );

    public function __construct($pubID){
        
        $this->pubID = $pubID;
        $this->pub = array();
    }
    
    public function getPub(){
        if (array_key_exists($this->pubID, $this->pubs)) {
            $this->pub = $this->pubs[$this->pubID];
        }
        return $this->pub;
    }
}
?>



