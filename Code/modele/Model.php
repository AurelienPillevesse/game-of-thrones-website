<?php

class Model {

    protected $dataError;

    public function getError() {
        if(empty($this->dataError)) {
            return false;
        }
        return $this->dataError;
    }
    
    public function __construct($dataError) {
        $this->dataError = $dataError;
    }

}