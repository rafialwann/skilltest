<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\UserProfiles;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
	public function index() {

		$userProfiles = UserProfiles::all();		
		return view('welcome', compact('userProfiles'));

	}


	public function addData(Request $request) {

		$name = $request->name;
		$salary = $request->salary;
		$dateofbirth = $request->tanggal_lahir;
		$status = $request->status;

		$success = false;
        try
        {
            DB::beginTransaction();

            $userProfiles = new UserProfiles;
            $userProfiles->name = $name;
            $userProfiles->gaji = $salary;
            $userProfiles->tanggal_lahir = $dateofbirth;
            $userProfiles->status_karyawan = $status;
            if(!$userProfiles->save()){
                throw new Exception("Cannot save user profiles info!");
            }else {
                info("user profiles saved $userProfiles->id");
            }

            DB::commit();
            $success = true;
        }
        catch (\Exception $e)
        {
            // Rollback Transaction
            DB::rollback();
            logger()->error('Problem while saving user profiles info: '. $e->getMessage());
        }

        if($success) {
            return redirect()->route('index')->with('success', "Success adding Data");
        } else {
            return back()->with('error', "Oops looks like there's problem in our server");
        }

	}

	public function getId($id) {

		$data = UserProfiles::where('id', $id)->get();
		return view('updatedata', compact('data'));

	}

	public function updateData(Request $request) {
		$id = $request->id;
		$success = false;
        try
        {
            DB::beginTransaction();

            $data = UserProfiles::where('id', $id)->update([
				'name' => $request->name,
				'gaji' => $request->salary,
				'status_karyawan' => $request->status
			]);

			info("user profiles update: $id");

            DB::commit();
            $success = true;
        }
        catch (\Exception $e)
        {
            // Rollback Transaction
            DB::rollback();
            logger()->error('Problem while update user profiles info: '. $e->getMessage());
        }

        if($success) {
            return redirect()->route('index')->with('success', "Success update Data");
        } else {
            return back()->with('error', "Oops looks like there's problem in our server");
        }

		
		return view('updatedata', compact('data'));

	}

	public function deleteData($id){		

		$success = false;
        try
        {
            DB::beginTransaction();

            $userProfiles = UserProfiles::find($id);
            if(!$userProfiles->delete()){
                throw new Exception("Cannot delete user profiles info!");
            }else {
                info("user profiles delete $userProfiles->id");
            }

            DB::commit();
            $success = true;
        }
        catch (\Exception $e)
        {
            // Rollback Transaction
            DB::rollback();
            logger()->error('Problem while delete user profiles info: '. $e->getMessage());
        }

        if($success) {
            return redirect()->route('index')->with('success', "Success delete Data");
        } else {
            return back()->with('error', "Oops looks like there's problem in our server");
        }
	}

}
