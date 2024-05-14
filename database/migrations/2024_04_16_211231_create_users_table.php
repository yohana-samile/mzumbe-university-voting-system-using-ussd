<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('gender');
                $table->string('phone_number')->unique();
                $table->string('email')->unique();
                $table->unsignedBigInteger('role_id');
                $table->unsignedBigInteger('year_of_studie_id');
                $table->unsignedBigInteger('programme_id');
                $table->string('password');
                $table->string('regstration_number');
                $table->timestamps();
                $table->rememberToken();
                $table->timestamp('email_verified_at')->nullable();
                $table->foreign('role_id')->references('id')->on('roles');
                $table->foreign('year_of_studie_id')->references('id')->on('year_of_studies');
                $table->foreign('programme_id')->references('id')->on('programmes');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void {
            Schema::dropIfExists('users');
        }
    };
