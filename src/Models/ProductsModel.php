<?php 

class ProductsModel
{

    private $barcode;
    private $name;
    private $type_id;
    private $price;
    private $stock_quantity;
    private $brand;
    private $description;
    private $image;

    public function __construct($data =null)
    {

        if($data !=null){
            $this->parseJson($data);
        }

    }
    
    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    		
    private function parseJson($data){
        if($data){
            $this->barcode = array_key_exists('barcode')? $data['barcode']:null;
            $this->name = $data['name'];
            $this->type_id = $data['type_id'];
            $this->price = $data['price'];
            $this->stock_quantity = $data['stock_quantity'];
            $this->brand = $data['brand'];
            $this->description = $data['description'];
            $this->image = $data['image'];
            
        }
    }

}