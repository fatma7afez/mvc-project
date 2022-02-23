<?php

namespace  User\Mvcroute\core;

class db{

    private $connection;

    private  $sql;

    public function __construct()
    {
        $this->connection = mysqli_connect("localhost","root","","mvcdb");
    }

    public function select($table){
        $this->sql = "SELECT * FROM `$table`";
        return $this;
    }

    public function where($column,$operator = '=',$value){
        $this->sql .= " WHERE `$column` $operator '$value' ";
        return $this;
    }

    public function Andwhere($column,$operator = '=',$value){
        $this->sql .= " AND `$column` $operator '$value' ";
        return $this;
    }
    public function first(){
//        echo $this->sql;die;
        $query =  mysqli_query($this->connection,$this->sql);
         if(is_object($query)){
             return mysqli_fetch_assoc($query);
         }
        $this->showErorrs();
    }

    public function rows(){
        $query =  mysqli_query($this->connection,$this->sql);

        if(is_object($query)){
            while($row = mysqli_fetch_assoc($query)){
                $data[] = $row;
            }
            return $data;
        }
        $this->showErorrs();
    }

    public function insert($table,$data){
        $rowcolumn = '';
        $rowvalue = '';
        foreach ($data as $column => $value){
            $rowcolumn .=  "`$column`,";
            $rowvalue .= " '$value',";

        }
        $rowcolumn = rtrim($rowcolumn , ',');
        $rowvalue = rtrim($rowvalue , ',');
        

        $this->sql = "INSERT INTO `$table` ($rowcolumn) VALUES ($rowvalue)";


        return $this;
    }



    public function update($table,$data){
        $row = '';
        foreach ($data as $column => $value){
            $row .=  "`$column` = '$value',";
        }
        $row = rtrim($row , ',');

        $this->sql = "UPDATE  `$table` SET $row";

        return $this;
    }

    public function delete($table){
        $this->sql = "DELETE FROM `$table` ";
        return $this;
    }
    public function  excute(){
        // echo $this->sql;die;
        mysqli_query($this->connection,$this->sql);
        return (mysqli_affected_rows($this->connection) == 1) ? mysqli_affected_rows($this->connection) : $this->showErorrs();
    }

    public function showErorrs(){
       $errors =  mysqli_error_list($this->connection);
       $showErorr = '<ul>';
       foreach ($errors as $error){
            $showErorr .= "<li style='color: red'>".$error['error']."</li>";
       }
        $showErorr .= "</ul>";
//        print_r($errors );
       echo $showErorr;
    }
    public  function  __destruct(){
        mysqli_close($this->connection);
    }
}