<?php
namespace App\Controller;
use App\Model\ProductModel;

class ProductController
{
    public $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function getAll()
    {
            if (empty($_REQUEST["search"])){
                $products = $this->productModel->getAll();
            }else{
                $products = $this->productModel->searchByName($_REQUEST["search"]);
            }
            include_once "App/View/list.php";
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        header("location:index.php?page=list");
    }

    public function create($request)
    {
        if ($_SERVER["REQUEST_METHOD"]=="GET"){
            $categories = $this->productModel->getCategories();
            include_once "App/View/create.php";
        }else{
            if ($_POST["name"]&&$_POST["price"]&&$_POST["quantity"]&&$_POST["description"]){
                $this->productModel->create($request);
                header("location:index.php?page=list");
            }else{
                echo "nhập đầy đủ thông tin";
            }
        }
    }

    public function update($request)
    {
        if ($_SERVER["REQUEST_METHOD"]=="GET"){
            $product = $this->productModel->getById($request["id"]);
            $categories = $this->productModel->getCategories();
            include_once "App/View/edit.php";
        }else{
            if ($_POST["name"]&&$_POST["price"]&&$_POST["quantity"]&&$_POST["description"]){
                $this->productModel->update($request);
                header("location:index.php?page=list");
            }else{
                echo "nhập đầy đủ thông tin";
            }
        }
    }

}