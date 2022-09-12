<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('response_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->string('user_ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};
