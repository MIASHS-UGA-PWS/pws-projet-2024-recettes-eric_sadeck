<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('recipe_id');
                $table->string('name');
                $table->text('message');
                $table->timestamps();

                $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            });
        }

        public function down()
        {
            Schema::dropIfExists('comments');
        }
    };
