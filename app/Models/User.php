<?php
    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable {
        use HasApiTokens, HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',  'email', 'password', 'gender', 'phone_number', 'role_id',
            'regstration_number', 'year_of_studie_id', 'programme_id'
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime', 'password' => 'hashed',
        ];
        public function roles() {
            return $this->BelongsTo(Role::class);
        }
        public function year_of_studys(){
            return $this->belongsTo(Year_of_study::class);
        }
        public function programmes(){
            return $this->belongsTo(Programme::class);
        }
        public function votes(){
            return $this->hasMany(Vote::class);
        }
    }

