<?php
    require_once __DIR__ . "/abstract_product.php";

    class Product extends AbstractProduct{
        private $id;
        private $sku;
        private $name;
        private $price;
        private $typeId;
        private $size;
        private $weight;
        private $height;
        private $width;
        private $length;

        public function __construct($id, $sku, $name, $price, $typeId, $size, $weight, $height, $width, $length) {
            $this->id = $id;
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->typeId = $typeId;
            $this->size = $size;
            $this->weight = $weight;
            $this->height = $height;
            $this->width = $width;
            $this->length = $length;
        }

        public function getId() {
            return $this->id;
        }
    
        public function getSku() {
            return $this->sku;
        }
    
        public function getName() {
            return $this->name;
        }
    
        public function getPrice() {
            return $this->price;
        }
        public function getTypeId() {
            return $this->typeId;
        }
    
        public function getSize() {
            return $this->size;
        }
    
        public function getWeight() {
            return $this->weight;
        }
    
        public function getHeight() {
            return $this->height;
        }
    
        public function getWidth() {
            return $this->width;
        }
    
        public function getLength() {
            return $this->length;
        }
    
        public function setSku($sku) {
            $this->sku = $sku;
        }
    
        public function setName($name) {
            $this->name = $name;
        }
    
        public function setPrice($price) {
            $this->price = $price;
        }
    
        public function setTypeId($typeId) {
            $this->typeId = $typeId;
        }
    
        public function setSize($size) {
            $this->size = $size;
        }
    
        public function setWeight($weight) {
            $this->weight = $weight;
        }
    
        public function setHeight($height) {
            $this->height = $height;
        }
    
        public function setWidth($width) {
            $this->width = $width;
        }
    
        public function setLength($length) {
            $this->length = $length;
        }
    }

?>  