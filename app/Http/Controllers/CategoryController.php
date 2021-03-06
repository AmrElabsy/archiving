<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::all();
		return view("categories.index", compact("categories") );
	}

	public function create()
	{
		return view("categories.add");
	}

	public function store(Request $request) {
		$rules = $this->getRules();

		$request->validate($rules);
		Category::create([
			"category" => $request->name,
		]);

		return redirect("categories");
	}

	public function show(Category $category)
	{
		$category = Category::where("categories.id", "=", $category->id)->firstOrFail();
		$documents = $category->documents;

		return view("categories.show", compact("category", "documents"));
	}

	public function edit(Category $category)
	{
		$category = Category::where("categories.id", "=", $category->id)->firstOrFail();

		return view("categories.edit", compact("category") );
	}

	public function update(Request $request, Category $category) {
		$category = Category::findOrFail($category->id);

		$category->update([
			"category" => $request->name,
		]);

		$category->save();

		return redirect("categories");
	}

	public function destroy(Category $category)
	{
		$category = Category::findOrFail($category->id);
		$category->delete();
		return redirect("categories");
	}

	private function getRules(): array {
		return [
			"name" => [ "required", "min:2", "max:60" ]
		];
	}
}
