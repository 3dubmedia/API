<?php
class Validate{
    private $isValid;

    public function __construct($data){
        $this->data = $data;
        $this->isValid = 0;
    }

    public function validateData(){
        if ($this->data['pubID']){
            $this->isValid=1;
        }
        return $this->isValid;
    }
}

class ValidateFactory{
    public static function create($data){
        return new Validate($data);
    }
}
?>



