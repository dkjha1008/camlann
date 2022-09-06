<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    //
	public function index(Request $request)
	{
		//$path = storage_path('tmp/uploads');
		$path = ('storage/screenshorts/');
		
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		$file = $request->file('file');

		$name = uniqid() . '_' . trim($file->getClientOriginalName());

		$file->move($path, $name);

		return response()->json([
			'name'          => $name,
			'original_name' => $file->getClientOriginalName(),
		]);
	}
	
}
