
Schema::create('alternatif', function (Blueprint $table) {
    $table->id();
    $table->string('nama_alternatif');
    $table->timestamps();
});
