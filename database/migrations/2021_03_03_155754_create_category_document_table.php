<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_document', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger("document_id");
			$table->unsignedBigInteger("category_id");
            $table->timestamps();

			$table->foreign("document_id")->references("id")->on("documents")
				->onDelete("CASCADE")->onUpdate("CASCADE");
			$table->foreign("category_id")->references("id")->on("categories")
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
        Schema::dropIfExists('category_document');
    }
}
