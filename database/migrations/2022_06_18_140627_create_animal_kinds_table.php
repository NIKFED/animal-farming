<?php

use App\Helpers\DictSeeder;
use App\Models\Dictionaries\AnimalKind;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use DictSeeder;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_kinds', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->float('max_size')->unsigned()->default(1.0);
            $table->integer('max_age')->unsigned()->default(1);
            $table->timestamps();
        });
        $this->seedFromFile(AnimalKind::class, 'animal_kinds.json');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_kinds');
    }
};
