<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->integer('sender')->unsigned();
            $table->integer('recipient')->unsigned();
            $table->date('date');
            $table->string('file_no');
            $table->string('subject');
            $table->text('body');
            $table->string('attachment')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('memos');
    }
};
