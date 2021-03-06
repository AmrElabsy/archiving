<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $types = Type::all();
        return view("types.index", compact("types") );
    }

    public function create()
    {
        return view("types.add");
    }

    public function store(Request $request) {
		$rules = $this->getRules();

		$request->validate($rules);
		Type::create([
			"type" => $request->name,
		]);

		return redirect("types");
	}

    public function show(Type $type)
    {
		$type = Type::where("types.id", "=", $type->id)->firstOrFail();
		$documents = $type->documents;

		return view("types.show", compact("type", "documents"));
	}

    public function edit(Type $type)
    {
		$type = Type::where("types.id", "=", $type->id)->firstOrFail();

		return view("types.edit", compact("type") );
	}

    public function update(Request $request, Type $type) {
		$type = Type::findOrFail($type->id);

		$type->update([
			"type" => $request->name,
		]);

		$type->save();

		return redirect("types");
	}

    public function destroy(Type $type)
    {
		$type = Type::findOrFail($type->id);
		$type->delete();
		return redirect("types");
    }

	private function getRules(): array {
		return [
			"name" => [ "required", "min:2", "max:60" ]
		];
	}
}
