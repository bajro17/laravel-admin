<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
  protected $fillable = [
      'title', 'description', 'active',
  ];
  protected $hidden = [

  ];
  public function images()
  {
    return $this->belongsToMany(Image::class);
  }
}
