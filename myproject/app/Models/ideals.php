<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ideals extends Model
{
    protected $with = ['user:id,name,image','comments.user:id,name,image'];

    protected $withCount = ['like'];

    use HasFactory;
    protected $fillable = ['user_id','content', 'like'];

    public function comments() {
        return $this->hasMany(Comment::class,'idea_id','id')->latest();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function like() {
        return $this->belongsToMany(User::class,'ideal_like')->withTimestamps();
    }
    public function scopeSearch($query, $search = '') {
        $query->where('content','like','%'.$search.'%');
    }
}
