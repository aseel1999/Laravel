<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDocument extends Model
{
    use HasFactory;

    public function order()
    {
      return $this->belongsTo(Order::class);
    }

    public function document()
    {
      return $this->belongsTo(Document::class);
    }

    public function order_document()
    {
      return $this->belongsTo(MinistryDocument::class);
    }
}
