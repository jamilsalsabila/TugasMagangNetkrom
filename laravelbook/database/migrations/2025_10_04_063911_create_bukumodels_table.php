<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->id();
            $table->String('kodebuku')->unique();
            $table->String('judul');
            $table->String('pengarang');
            $table->integer('harga')->default(0);
            $table->foreignId('idpenerbit')->nullable()->constrained('tbl_penerbit', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_buku', function (Blueprint $table) {
            if (Schema::getForeignKeys('tbl_buku')) {
                $table->dropForeign('tbl_buku_idpenerbit_foreign');
            }
        });
        Schema::dropIfExists('tbl_buku');
    }
};
