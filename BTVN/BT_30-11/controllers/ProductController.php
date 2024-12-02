<?php
require_once '../models/Product.php';
class ProductController{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new Product();
    }
    public function index()
    {
        $products =  $this->productModel->getAll();
        require '../views/products/index.php';
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->productModel->add($_POST);
            header('Location: /');
        }
        require '../views/products/add.php';
    }
    public function update($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->productModel->update($id, $_POST);
            header('Location: /');
        }
        $product = $this->productModel->getByID($id);
        require '../views/products/update.php';
    }
    public function delete($id)
    {
        $this->productModel->delete($id);
        header('Location: /');
    }
}
?>