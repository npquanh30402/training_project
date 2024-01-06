<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop_Hoc extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function instructor()
    {
        return $this->hasOne(User::class)->where('role_id', '=', '3');
    }

    public function store(Request $request)
    {
        $existingUsersCount = $this->users()->count();

        if ($existingUsersCount > 0) {
            return;
        }

        $instructor = $this->instructor()->first();

        if ($instructor) {
            $instructor->update($request->only(['name', 'email']));
        } else {
            $this->instructor()->create($request->only(['name', 'email']));
        }
    }
}
