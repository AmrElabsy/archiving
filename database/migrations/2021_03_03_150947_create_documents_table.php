<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string("document");
            $table->string("link");
			$table->unsignedBigInteger("type_id");
			$table->unsignedBigInteger("source_id");
            $table->timestamps();

			$table->foreign("type_id")->references("id")->on("types")
				->onDelete("CASCADE")->onUpdate("CASCADE");
			$table->foreign("source_id")->references("id")->on("departments")
				->onDelete("CASCADE")->onUpdate("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
