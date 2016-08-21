<?php
class Scrub{
    private $isValid;

    public function __construct($data){
        $this->data = $data;
        $this->newData = array();
    }
    
    public function scrubData(){
        if (is_array($this->data)){
            foreach ($this->data as $k=>$v){
                $v = htmlspecialchars($v);
                $this->newData[$k]=$v;
            }
            
        }
        return $this->newData;
    }
}
?>



