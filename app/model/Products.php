<?php

class Products extends Database{  
    
    // method for adding product
    public function addProduct($post){
        
        if($post){
            $this->query('INSERT INTO products (SKU, name, price, type, size) VALUES(:SKU, :name, :price, :type, :size)');
            $this->bind(':SKU', $post['sku']);
            $this->bind(':name', $post['name']);
            $this->bind(':price', $post['price']);
            $this->bind(':type', $post['type']);
            $this->bind(':size', $post['size']);
            $this->execute();



            if($this->lastInsertId()){               
                echo "Product added successfully!";
            }
        
        }
        return;
    }
    // method for showing all products
    public function getProducts(){
        $this->query('SELECT * FROM products ');
        $rows=$this->resultSet();
        echo json_encode($rows);
    }

    // method for mass delete
    public function massDelete($post){

        $arr1=explode(',', $post["id"]);
        
        foreach ($arr1 as $id) {
            $this->query('DELETE FROM products WHERE id=:id');
            $this->bind(':id', $id);
            $this->execute();
         
        }
        echo "Products Deleted!";
    return;
    }

}