
Schema::create('kriteria', function (Blueprint $table) {
    $table->id();
    $table->string('nama_kriteria');
    $table->double('bobot');
    $table->enum('jenis', ['benefit', 'cost']);
    $table->timestamps();
});
