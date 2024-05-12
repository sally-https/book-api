<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Student extends Authenticatable implements JWTSubject{

    use HasFactory;
    protected $fillable = ['name','student_id','email', 'password'];
    protected $hidden = ['password']; // Add this line to hide the password attribute
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

     public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the password for the admin model.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}
