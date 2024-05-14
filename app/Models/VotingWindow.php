<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class VotingWindow extends Model {
        use HasFactory;
        protected $fillable = ['time_from', 'time_to_end', 'status'];
        public function votes(){
            return $this->hasMany(Vote::class);
        }
    }
