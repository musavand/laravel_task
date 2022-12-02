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
        Schema::create('table_b_s', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
            $table->foreignId('table_a_id')->constrained('table_a_s');;            
            $table->integer('star_count')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false)->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->nullable(false)->change();

         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_b_s');
    }
};
