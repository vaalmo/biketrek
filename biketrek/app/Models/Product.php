<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
       /** 
     * PRODUCT ATTRIBUTES 
     * $this->attributes['id'] - int - contains the product primary key (id) 
     * $this->attributes['name'] - string - contains the product name 
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['stock'] - int - contains the product stock
     * $this->attributes['image'] - string - contains the product image  
     * $this->attributes['brand'] - string - contains the product brand 
     * $this->attributes['type'] - string - contains the product type 
     * $this->attributes['created_at'] - timestamp - contains the product creation date 
     * $this->attributes['updated_at'] - timestamp - contains the product update date 
     */

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'brand',
        'type',
        'color'
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['desctription'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price)
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock)
    {
        $this->attributes['stock'] = $stock;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image)
    {
        $this->attributes['image'] = $image;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand($brand)
    {
        $this->attributes['brand'] = $brand;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType($type)
    {
        $this->attributes['type'] = $type;
    }

    public function getColor(): string
    {
        return $this->attributes['color'];
    }

    public function setColor($color)
    {
        $this->attributes['color'] = $color;
    }

}
