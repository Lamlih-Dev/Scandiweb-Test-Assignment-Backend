<?php
    require_once __DIR__ . "/services/db.php";
    require_once __DIR__ . "/models/product.php";

    class API{
        function GET(){
            $db = new DB;
            $products = array();
            $data = $db->prepare("SELECT * FROM products ORDER BY sku");
            $data->execute();

            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                $product= new Product(
                    $row["id"],
                    $row["sku"],
                    $row["name"],
                    $row["price"],
                    $row["type-id"],
                    $row["Size"],
                    $row["Weight"],
                    $row["Height"],
                    $row["Width"],
                    $row["Length"],
                );
                $products[] = $product;
            }
            
            $outputData = array();
            foreach ($products as $product) {
                $outputData[] = array(
                    "id" => $product->getId(),
                    "sku" => $product->getSku(),
                    "name" => $product->getName(),
                    "price" => $product->getPrice(),
                    "type-id" => $product->getTypeId(),
                    "Size" => $product->getSize(),
                    "Weight" => $product->getWeight(),
                    "Height" => $product->getHeight(),
                    "Width" => $product->getWidth(),
                    "Length" => $product->getLength(),
                );
            }            
            return json_encode($outputData);
        }

        function POST(){
            $db = new DB;
            $skuExist = false;
            $data = $db->prepare("SELECT * FROM products ORDER BY sku");
            $data->execute();

            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                if($row["sku"] == $_POST["sku"]){
                    $skuExist = true;
                    break;
                }
            }

            if(!$skuExist){   
                if($_POST["type"] == 1){
                    $addProduct = $db->prepare(
                        "INSERT INTO 
                        `products`(`sku`, `name`, `price`, `type-id`, `Size`, `Weight`, `Height`, `Width`, `Length`)
                        VALUES (?,?,?,?,?,NULL,NULL,NULL,NULL)");
        
                    $addProduct->execute(array(
                        $_POST["sku"],
                        $_POST["name"],
                        $_POST["price"],
                        $_POST["type"],
                        $_POST["size"],
                    ));    
                } else if($_POST["type"] == 2){
                    $addProduct = $db->prepare(
                        "INSERT INTO 
                        `products`(`sku`, `name`, `price`, `type-id`, `Size`, `Weight`, `Height`, `Width`, `Length`)
                        VALUES (?,?,?,?,NULL,?,NULL,NULL,NULL)");
        
                    $addProduct->execute(array(
                        $_POST["sku"],
                        $_POST["name"],
                        $_POST["price"],
                        $_POST["type"],
                        $_POST["weight"],
                    ));
                } else{ 
                    $addProduct = $db->prepare(
                        "INSERT INTO 
                        `products`(`sku`, `name`, `price`, `type-id`, `Size`, `Weight`, `Height`, `Width`, `Length`)
                        VALUES (?,?,?,?,NULL,NULL,?,?,?)");
        
                    $addProduct->execute(array(
                        $_POST["sku"],
                        $_POST["name"],
                        $_POST["price"],
                        $_POST["type"],
                        $_POST["height"],
                        $_POST["width"],
                        $_POST["length"],
                    ));
                }
                $count = $addProduct->rowCount();
                if($count > 0){
                    return json_encode(["status" => "success"]);
                }
                else{
                    return json_encode(["status" => "fail"]);
                }
            } else{
                return json_encode(["status" => "fail", "message" => "SKU Already Used"]);
            }
        }

        function DELETE(){
            $db = new DB;
            foreach(explode(",",$_POST["productsToDelete"]) as $productToDelete){
                $deleteProducts = $db->prepare("DELETE FROM `products` WHERE id=?");
                $deleteProducts->execute(array($productToDelete));
            }
        }
    }   
?>