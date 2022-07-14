<?php
//database/migrations/
// Laravel sử dụng namespace để nhúng file thay vì
//nhúng thủ công require_once
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
        // Injection đối tượng vào hàm là 1 tính năng mặc định
        //của Laravel
        Schema::create('products', function (Blueprint $table) {
            // Bảng products: id,name,price,created_at,updated_at
            $table->increments('id');
            $table->string('name', 150);
            $table->integer('price');
            $table->timestamps();

//            $table->foreignId('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
