<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfiles;
class ApiController extends Controller
{
    
	public function getAllData() {
      $data = UserProfiles::get()->toJson(JSON_PRETTY_PRINT);
      return response($data, 200);
    }


    public function getDataId($id) {
      
      if (UserProfiles::where('id', $id)->exists()) {
        
        $data = Book::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($data, 200);

      } else {

        return response()->json([
          "message" => "Data User not found"
        ], 404);

      }

    }

    public function createData(Request $request) {

		$userProfiles = new UserProfiles;
		$userProfiles->name = $request->name;
		$userProfiles->gaji = $request->salary;
		$userProfiles->tanggal_lahir = $request->tanggal_lahir;
		$userProfiles->status_karyawan = $request->status;
		$userProfiles->save();

      return response()->json([
        "message" => "Data record"
      ], 201);
    }


    public function updateData(Request $request, $id) {
    	if (UserProfiles::where('id', $id)->exists()) {

    		$data = UserProfiles::find($id);

			$data->name = is_null($request->name) ? $data->name : $data->name;
			$data->gaji = is_null($request->salary) ? $data->salary : $data->salary;
			$data->tanggal_lahir = is_null($request->tanggal_lahir) ? $data->tanggal_lahir : $data->tanggal_lahir;
			$data->status_karyawan = is_null($request->status) ? $data->status : $data->status;
			$data->save();
			
			return response()->json([
				"message" => "records updated successfully"
			], 200);

		} else {
			return response()->json([
				"message" => "Data not found"
			], 404);
		}
    }

    public function deleteData ($id) {
      if(UserProfiles::where('id', $id)->exists()) {
        $book = UserProfiles::find($id);
        $book->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Data not found"
        ], 404);
      }
    }

}
