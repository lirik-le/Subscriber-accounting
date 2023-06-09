<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Employee extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'staff';
    protected $fillable = [
        'id',
        'username',
        'password',
        'role'
    ];

    protected static function booted()
    {
        static::created(function ($employee) {
            $employee->password = md5($employee->password);
            $employee->save();
        });
    }

    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    //Возврат роли
    public function getRole(): int
    {
        return $this->role;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where(['username' => $credentials['username'],
            'password' => md5($credentials['password'])])->first();
    }
}
