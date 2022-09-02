<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinistryDocument extends Model
{
    use HasFactory;

    public function ministry()
    {
      return $this->belongsTo(Ministry::class);
    }

    public function document()
    {
      return $this->belongsTo(Document::class);
    }

    public function order_documents()
    {
      return $this->hasMany(OrderDocument::class);
    }
}
