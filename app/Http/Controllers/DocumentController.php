<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
		return view("documents.index", compact("documents") );
	}

    public function create()
    {
		$departments = DB::table("departments")->get();
		$categories = DB::table("categories")->get();
		$types = DB::table("types")->get();

		return view("documents.add", compact("departments", "categories", "types"));
    }

    public function store(Request $request)
    {
		$rules = $this->getRules();
		$file_to_store = $this->handleDocumentAndGetFileToStore( $request, "document" );

		$request->validate($rules);

		$document = Document::create([
			"document" => $request->name,
			"link" => $file_to_store,
			"type_id" => $request->type,
			"source_id" => $request->source
		]);

		foreach ( $request->goingTo as $department ) {
			DB::table("department_document")->insert([
				"document_id" => $document->id,
				"department_id" => $department
			]);
		}

		foreach ( $request->categories as $category ) {
			DB::table("category_document")->insert([
				"document_id" => $document->id,
				"category_id" => $category
			]);
		}

		return redirect("documents");
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {

    }

    public function edit(Document $document)
    {
    	$document = Document::findOrFail( $document->id );
		$departments = DB::table("departments")->get();
		$categories = DB::table("categories")->get();
		$types = DB::table("types")->get();

		return view("documents.edit", compact("document", "departments", "categories", "types"));
    }


    public function update(Request $request, Document $document)
    {
		$rules = $this->getRules();
		$file_to_store = $this->handleDocumentAndGetFileToStore( $request, "document" );

		$request->validate($rules);

		$document = Document::findOrFail($document->id);

		$document->update([
			"document" => $request->name,
			"type_id" => $request->type,
			"source_id" => $request->source
		]);

		if ( $file_to_store != null ) {
			$document->update([
				"link" => $file_to_store
			]);
		}

		DB::table("department_document")
			->where("document_id", "=", $document->id )
			->delete();

		foreach ( $request->goingTo as $department ) {
			DB::table("department_document")->insert([
				"document_id" => $document->id,
				"department_id" => $department
			]);
		}

		DB::table("category_document")
			->where("document_id", "=", $document->id )
			->delete();


		foreach ( $request->categories as $category ) {
			DB::table("category_document")->insert([
				"document_id" => $document->id,
				"category_id" => $category
			]);
		}

		return redirect("documents");
    }


    public function destroy(Document $document)
    {
        //
    }

	private function getRules(): array {
		return [
			"name" => [ "required", "min:2", "max:60" ],
		];
	}

	private function handleDocumentAndGetFileToStore( $request, $key ) {
		if ( $request->file( $key ) ) {
			$document = $request->file( $key );
			$filename = $document->getClientOriginalName();
			$fileExtension = $document->getClientOriginalExtension();
			$file_to_store = time() . '' . explode('.', $filename )[0] . '.' . $fileExtension;

			$document->move( '_documents/', $file_to_store );

			return $file_to_store;
		} else {
			return null;
		}
	}
}
