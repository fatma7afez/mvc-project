<?php 

namespace  User\Mvcroute\core;

class validation{
    private $rule=[
        'uri'           => '[A-Za-z0-9-\/_?&=]+',
        'url'           => '[A-Za-z0-9-:.\/_?&=#]+',
        'alpha'         => '[\p{L} .]+',
        'words'         => '[\p{L}\s]+',
        'alphanum'      => '[\p{L}0-9]+',
        'int'           => '[0-9]+',
        'float'         => '[0-9\.,]+',
        'tel'           => '[0-9+\s()-]+',
        'text'          => '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
        'file'          => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+\.[A-Za-z0-9]{2,4}',
        'folder'        => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+',
        'address'       => '[\p{L}0-9\s.,()°-]+',
        'date_dmy'      => '[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}',
        'date_ymd'      => '[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}',
        'email'         => '[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})'
    ];
    private $input;
    private $value;
    private $error = [];


    public function inputValue($value){
        $this->input = $value;
        $this->value=$_REQUEST[$value];
        return $this ;
    }

    public function requireData(){
        if($this->value == '' || strlen($this->value) < 0){
            $this->error [] = "this input $this->input must be required ";
        }
        return $this;
    }

    public function minData($number){
        if(strlen($this->value) < $number){
            $this->error [] = "this $this->input must be min length 3 ";
        }
        return $this;
    }

    public function maxData($number){
        if(strlen($this->value) > $number){
            $this->error [] = "this $this->input must be max length 8 ";
        }
        return $this;
    }

    public function alphaData(){
        $regex = '/^('.$this->rule['alpha'].')$/u';
        if(!preg_match($regex,$this->value)){
            $this->error [] = "this $this->input must be character ";
        }
        return $this;
    }
    public function emailData(){
        $regex = '/^('.$this->rule['email'].')$/u';
        if(!preg_match($regex,$this->value)){
            $this->error [] = "this $this->input must be email ";
        }
        return $this;
    }
    public function priceData(){
        $regex = '/^('.$this->rule['int'].')$/u';
        if(!preg_match($regex,$this->value)){
            $this->error [] = "this $this->input must be integer ";
        }
        return $this;
    }

    public function showErrors(){
        return $this->error;
    }

    public function valid(){
        return empty($this->error)? true : false;
    }
}




?>