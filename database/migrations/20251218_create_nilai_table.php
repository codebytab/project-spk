
Schema::create('nilai', function (Blueprint $table) {
    $table->id();
    $table->foreignId('alternatif_id')->constrained()->cascadeOnDelete();
    $table->foreignId('kriteria_id')->constrained()->cascadeOnDelete();
    $table->double('nilai');
    $table->timestamps();
});
