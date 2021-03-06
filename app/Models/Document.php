<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['document', 'link', 'type_id', "source_id"];

    public function source() {
    	return $this->belongsTo(Department::class, "source_id");
	}

	public function type() {
    	return $this->belongsTo(Type::class);
	}

	public function allCategories() {
		return $this->belongsToMany(Category::class);
	}

	public function getCategoriesArrayAttribute() {
		$ids = [];
		foreach ( $this->allCategories as $department ) {
			$ids[] = $department->id;
		}
		return $ids;
	}

	public function getCategoriesAttribute() {
    	$text = "";
    	for ( $i = 0; $i < sizeof( $this->allCategories ); $i++ ) {
    		$text .= $this->allCategories[$i]->category;
    		if ( count( $this->allCategories ) - $i > 1 ) {
    			$text .= " و";
			}
		}
    	return $text;
	}

	public function departmentsGoingToObject() {
		return $this->belongsToMany(Department::class);
	}

	public function getGoingToArrayAttribute() {
    	$ids = [];
    	foreach ( $this->departmentsGoingToObject as $department ) {
    		$ids[] = $department->id;
		}
    	return $ids;
	}

	public function getGoingToAttribute() {
		$text = "";
		for ( $i = 0; $i < sizeof( $this->departmentsGoingToObject ); $i++ ) {
			$text .= $this->departmentsGoingToObject[$i]->department;
			if ( count( $this->departmentsGoingToObject ) - $i > 1 ) {
				$text .= " و";
			}
		}
		return $text;
	}

	public function getNameAttribute() {
    	$ext = explode(".", $this->link);
    	$ext = end($ext);

		return $this->document . "." . $ext;
	}
}
