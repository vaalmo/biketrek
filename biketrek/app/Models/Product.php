<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

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
     * $this->attributes['color'] - string - contains the product color 
     * $this->attributes['created_at'] - timestamp - contains the product creation date 
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->items - Item[] - contains the associated items  
     */

    protected $fillable = [ 'name','description','price','stock','image','brand','type','color'];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "description" => "required|string",
            "price" => "required|numeric|gt:0",
            "stock" => "required|integer|min:0",
            'image' => 'image',
            "brand" => "required|string",
            "type" => "required|string",
            "color" => "required|string",
        ]);
    }

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
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getColor(): string
    {
        return $this->attributes['color'];
    }

    public function setColor(string $color): void
    {
        $this->attributes['color'] = $color;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt): void
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt): void
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function getReviews()
    {
        return $this->reviews;
    }

    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }

}
