<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationReporter extends Model
{
    use HasFactory;

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'publication_id');
    }
}
