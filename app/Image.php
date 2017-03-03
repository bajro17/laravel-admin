<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = [
      'thumb', 'big', 'title', 'description',
  ];
  public function category()
  {
    return $this->belongsToMany(CategoryGallery::class);
  }
}
