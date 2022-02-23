<?php 

namespace  User\Mvcroute\controllers;

use User\Mvcroute\core\basecontroller;
use User\Mvcroute\core\registry;


class home extends basecontroller{


    // index function display into DB like home;
    public function index(){
    $product = registry::get("product");   
     $data= $product->getProductData();
     $this->view('index',['key'=>$data]);
    }
    

// addData function add into DB;
    public function addData(){ 
        $this->view('add');

}


// storeData function  display and check a validation from DB;

public function storeData(){ 
    registry::get("validate")->inputValue('productname')->requireData()->alphaData()->minData(3)->maxData(8);
    registry::get("validate")->inputValue('productcategory')->requireData()->alphaData()->minData(3)->maxData(8);
    registry::get("validate")->inputValue('productprice')->requireData()->priceData();
    registry::get("validate")->inputValue('productdesc')->requireData()->alphaData()->minData(5)->maxData(30);

    if( registry::get("validate")-> valid()){
        $products = registry::get("product");
        $products-> addProductData($_POST);
        redirect("addData");
    }
    else{
      $errors =  registry::get("validate")->showErrors();
      setcookie('alert',json_encode($errors),time()+2,"/");
      redirect("addData",['key'=>$_POST]);
    }
  
}

// DeleteData function delete from DB;
public function DeleteData(){ 
    $id = explode("/", $_SERVER['QUERY_STRING']);
    $product = registry::get("product");
    $product->DeleteProductData($id[2]);  
    redirect("../index");
}

// editData function go to form;
public function editedData(){
    $id = explode("/", $_SERVER['QUERY_STRING']);
    $dta = registry::get("product");
    $oneproduct= $dta->getProductDataById($id[2]);
    $this->view('update',['product'=>$oneproduct]); 
}

// updatedData function delete from DB;

public function updatedData(){

     registry::get("validate")->inputValue('productname')->requireData()->alphaData()->minData(3)->maxData(8);
     registry::get("validate")->inputValue('productcategory')->requireData()->alphaData()->minData(3)->maxData(8);
     registry::get("validate")->inputValue('productprice')->requireData()->priceData();
     registry::get("validate")->inputValue('productdesc')->requireData()->alphaData()->minData(5)->maxData(30);

    if( registry::get("validate")-> valid()){
    $dta = registry::get("product");
    $dta->updateProductData($_POST);
    redirect("index");
    }
    else{
      $errors =  registry::get("validate")->showErrors();
      setcookie('alert',json_encode($errors),time()+2,"/");
      redirect("editedData/".$_POST['id']);
    }
}






}
