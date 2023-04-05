<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'title',
    'body',
    ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderby('updated_at', 'DESC')->Paginate($limit_count);
    }
    
    public function store(Request $request, Post $post)
    {
    $input = $request['post'];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
    }
}
