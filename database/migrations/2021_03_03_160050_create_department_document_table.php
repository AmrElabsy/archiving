<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("document_id");
			$table->unsignedBigInteger("department_id");
			$table->timestamps();

			$table->foreign("document_id")->references("id")->on("documents")
				->onDelete("CASCADE")->onUpdate("CASCADE");
			$table->foreign("department_id")->references("id")->on("departments")
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
        Schema::dropIfExists('department_document');
    }
}
