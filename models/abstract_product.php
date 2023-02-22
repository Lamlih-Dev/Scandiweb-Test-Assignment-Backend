<?php
    abstract class AbstractProduct{
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

        abstract public function getId();
        abstract public function getSku();
        abstract public function getName();
        abstract public function getPrice();
        abstract public function getTypeId();
        abstract public function getSize();
        abstract public function getWeight();
        abstract public function getHeight();
        abstract public function getWidth();
        abstract public function getLength();

        abstract public function setSku($sku);
        abstract public function setName($name);
        abstract public function setPrice($price);
        abstract public function setTypeId($typeId);
        abstract public function setSize($size);
        abstract public function setWeight($weight);
        abstract public function setHeight($height);
        abstract public function setWidth($width);
        abstract public function setLength($length);
    }

?>  