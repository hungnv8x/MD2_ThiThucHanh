<?php
namespace App\Model;
use PDO;
class ProductModel
{
    public $connect;
    public function __construct()
    {
        $db = new DBConnect();
        $this->connect = $db->connect();
    }

    public function getAll()
    {
        $sql = "select products.id as productId , products.name as productName, price,quantity,date,products.description,c.name as categoryName from ThiThucHanh.products join categories c on c.id = products.category_id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id)
    {
        $sql ="select products.id as productId , products.name as productName, price,quantity,date,products.description,c.name as categoryName from ThiThucHanh.products join categories c on c.id = products.category_id where products.id = $id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function searchByName($name)
    {
        $sql = "select products.name as productName ,c.name as categoryName from ThiThucHanh.products join categories c on c.id = products.category_id where products.name like '%$name%'";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategories()
    {
        $sql ="select * from categories";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function create($data)
    {
        $sql = "insert into products(name, category_id, price, quantity, date, description) values (?,?,?,?,?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$data["name"]);
        $stmt->bindParam(2,$data["category_id"]);
        $stmt->bindParam(3,$data["price"]);
        $stmt->bindParam(4,$data["quantity"]);
        $stmt->bindParam(5,$data["date"]);
        $stmt->bindParam(6,$data["description"]);
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = "update products set name = ?, category_id = ?, price = ?, quantity= ?, date = ?, description =? where id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$data["name"]);
        $stmt->bindParam(2,$data["category_id"]);
        $stmt->bindParam(3,$data["price"]);
        $stmt->bindParam(4,$data["quantity"]);
        $stmt->bindParam(5,$data["date"]);
        $stmt->bindParam(6,$data["description"]);
        $stmt->bindParam(7,$data["id"]);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "delete from products where id = $id";
        $this->connect->query($sql);
    }

}