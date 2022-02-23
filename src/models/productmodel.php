<?php

namespace  User\Mvcroute\models;

use User\Mvcroute\core\db;

class  productmodel extends db{
    
    public function getProductData(){

      return  $this->select("products")->rows();
    }

    public function addProductData($data){

      return  $this->insert("products",$data)->excute();

    }

    public function DeleteProductData($id){
      return $this->delete("products")->where('id','=',$id)->excute();
    }

    public function getProductDataById($id){
      return $this->select("products")->where('id','=',$id)->first();
    }

    public function updateProductData($data){
      return $this->update("products",$data)->where('id','=',$data['id'])->excute();
    }
}







?>