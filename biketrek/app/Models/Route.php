<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Route extends Model{

    protected $fillable = ['name', 'description', 'startPoint', 'finalPoint', 'score', 'location', 'time', 'createdAt', 'image', 'user'];
    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getUserId(): string{
        return $this->attributes['user_id'];
    }

    public function setUserId(string $user_id): void{
        $this->attributes['user_id'] = $user_id;
    } 

    public function getName(): string{
        return $this->attributes['name'];
    }


    //Los setters los ponemos como void, ya que no retornan nada
    public function setName(string $name): void{
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string{
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void{
        $this->attributes['description'] = $description;
    }

    public function getStartPoint(): string{
        return $this->attributes['startPoint'];
    }

    public function setStartPoint(string $startPoint): void{
        $this->attributes['startPoint'] = $startPoint;
    }

    public function getFinalPoint(): string{
        return $this->attributes['finalPoint'];
    }

    public function setFinalPoint(string $finalPoint): void{
        $this->attributes['finalPoint'] = $finalPoint;
    }

    public function getScore(): int{
        return $this->attributes['score'];
    }

    public function setScore(int $score): void{
        $this->attributes['score'] = $score;
    }

    public function getLocation(): string{
        return $this->attributes['location'];
    }

    public function setLocation(string $location): void{
        $this->attributes['location'] = $location;
    }

    public function getTime(): string{
        return $this->attributes['time'];
    }

    public function setTime(string $time): void{
        $this->attributes['order'] = $time;
    }

    public function getCreatedAt(): string{
        return $this->attributes['review'];
    }


    public function getImage(): string{
        return $this->attributes['image'];
    }

    public function setImage(string $image): void{
        $this->attributes['image'] = $image;
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
    
    
}