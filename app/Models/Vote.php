<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Vote extends Model {
        use HasFactory;
        protected $fillable = ['user_id', 'candidate_id', 'voting_window_id'];
        public function votingWindow(){
            return $this->belongsTo(VotingWindow::class);
        }
        public function user() {
            return $this->belongsTo(User::class);
        }
        public function candidate() {
            return $this->belongsTo(Candidate::class);
        }
    }
