<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
		$departments = Department::all();
		return view("departments.index", compact("departments") );
    }

	public function create()
	{
		return view("departments.add");
	}

	public function store(Request $request) {
		$rules = $this->getRules();

		$request->validate($rules);
		Department::create([
			"department" => $request->name,
		]);

		return redirect("departments");
	}

	public function show(Department $department)
	{
		$department = Department::where("departments.id", "=", $department->id)->firstOrFail();
		$documents = $department->documents;

		return view("departments.show", compact("department", "documents"));
	}

	public function edit(Department $department)
	{
		$department = Department::where("departments.id", "=", $department->id)->firstOrFail();

		return view("departments.edit", compact("department") );
	}

	public function update(Request $request, Department $department) {
		$department = Department::findOrFail($department->id);

		$department->update([
			"department" => $request->name,
		]);

		$department->save();

		return redirect("departments");
	}

	public function destroy(Department $department)
	{
		$department = Department::findOrFail($department->id);
		$department->delete();
		return redirect("departments");
	}

	private function getRules(): array {
		return [
			"name" => [ "required", "min:2", "max:60" ]
		];
	}
}
