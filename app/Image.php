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
    return $this->belongsToMany(CategoryGallery::class, 'category_image','category_id','image_id');
  }
  public function hasCategory($category)
  {
      foreach ($this->category as $category_t){
          if ($category_t->id == $category){
              return true;
          }
      }
      return false;
  }
}
