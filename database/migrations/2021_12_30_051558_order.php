<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id');
        $table->string('nama_user');
        $table->string('no_telpon');
        $table->string('alamat');
        $table->string('ukuran');
        $table->foreignId('category_id');
        $table->string('qty');
        $table->string('name_product');
        $table->string('photo');
        $table->text('description');
        $table->string('warna');
        $table->string('uk_panjang');
        $table->string('uk_lingkar');
        $table->string('uk_pinggang');
        $table->string('uk_lengan');
        $table->string('uk_pundak');
        $table->decimal('total');
        $table->timestamps();
      });

      Schema::table('orders', function (Blueprint $table) {
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
