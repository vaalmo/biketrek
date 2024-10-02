<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\http\Request;

class Review extends Model{

    protected $fillable = ['comment', 'raiting'];
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getComment(): string{
        return $this->attributes['comment'];
    }


    //Los setters los ponemos como void, ya que no retornan nada
    public function setComment(string $comment): void{
        $this->attributes['comment'] = $comment;
    }

    public function getRaiting(): int{
        return $this->attributes['raiting'];
    }

    public function setRaiting(int $raiting): void{
        $this->attributes['raiting'] = $raiting;
    }

    public function getUserId(): string{
        return $this->attributes['user_id'];
    }

    public function setUserId(string $user_id): void{
        $this->attributes['user_id'] = $user_id;
    }

    public function getProductId(): string{
        return $this->attributes['product_id'];
    }

    public function setProductId(string $product_id): void{
        $this->attributes['product_id'] = $product_id;
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function getUser(): User{
        return $this->user;
    }

    public function setUser(User $user): void{
        $this->user()->associate($user);
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): string{
        return $this->product;
    }

    public function setProduct(Product $product):void{
        $this->product()->associate($product);
    }

    

}

