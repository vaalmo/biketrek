<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class UserCustomer extends Model{

    protected $fillable = ['name', 'email', 'password', 'address', 'phoneNumber', 'role', 'orders', 'reviews', 'routes'];
    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getName(): string{
        return $this->attributes['name'];
    }


    //Los setters los ponemos como void, ya que no retornan nada
    public function setName(string $name): void{
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string{
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void{
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string{
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void{
        $this->attributes['password'] = $password;
    }

    public function getAddress(): string{
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void{
        $this->attributes['address'] = $address;
    }

    public function getPhoneNumber(): string{
        return $this->attributes['phoneNumber'];
    }

    public function setPhoneNumber(string $phoneNumber): void{
        $this->attributes['phoneNumber'] = $phoneNumber;
    }

    public function getRole(): string{
        return $this->attributes['role'];
    }

    public function setRole(string $role): void{
        $this->attributes['role'] = $role;
    }

    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection{
        return $this->reviews;
    }

    public function setReviews(Collection $reviews):void{
        $this->reviews = $reviews;
    }

    public function orders(): HasMany{
        return $this->hasMany(Order::class);
    }

    public function getOrders(): Collection{
        return $this->orders;
    }

    public function setOrders(Collection $orders):void{
        $this->orders = $orders;
    }

    public function routes(): HasMany{
        return $this->hasMany(Route::class);
    }

    public function getRoutes(): Collection{
        return $this->routes;
    }

    public function setRoutes(Collection $routes):void{
        $this->routes = $routes;
    }
    
}