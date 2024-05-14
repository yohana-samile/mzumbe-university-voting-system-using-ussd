<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Candidate extends Model {
        use HasFactory;
        protected $fillable = ['name', 'position_id', 'wining_status', 'total_votes'];
        public function positions() {
            return $this->belongsTo(Position::class);
        }
        public function votes(){
            return $this->hasMany(Vote::class);
        }
    }
