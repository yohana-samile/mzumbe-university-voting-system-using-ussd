<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class USSDSession extends Model {
        use HasFactory;
        protected $fillable = [
            'session_id',
            'data',
        ];
        protected $casts = [
            'data' => 'array',
        ];
    }
