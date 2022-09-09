<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ProfileController extends Controller
{
    //
	use LivewireAlert;
	
	
	public function index()
    {
		$title = array(
			'title' => 'Profile',
			'active' => 'profile'
		);
		$user = auth()->user();
		$details = $user->details;
		
        return view('profile.profile', compact('title', 'user', 'details'));
    }

    public function update(Request $request)
	{ 
		
		$request->validate([
			'first_name' => 'required|max:50',
			'last_name' => 'required|max:50',
        ]);
		
		$user = auth()->user();
		
        if($request->image && strpos($request->image, "data:") !== false) {
			$image = $request->image;
			
            $folderPath = ('storage/images/');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0775, true);
                chown($folderPath, exec('whoami'));
            }

            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_base64 = base64_decode($image_parts[1]?? null) ?? null;
            $file_name = $user->id . '-' . md5(uniqid() . time()) . '.png';
            $imageFullPath = $folderPath.$file_name;
            file_put_contents($imageFullPath, $image_base64);
            
			//...
			$user->image = $file_name;
        }

		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->bio = $request->bio;
		$user->save();
		
		
		$this->flash('success', 'Profile updated successfully');
        return redirect()->back();
	}
	
	
	public function password()
    {
		$title = array(
			'title' => 'Change Password',
			'active' => 'profile'
		);
        return view('profile.password', compact('title'));
    }

    public function passwordUpdate(Request $request)
	{		
		$request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|same:new-password',
            'new-password_confirmed' => 'required|same:new-password',
        ]);

		if (!(Hash::check($request->get('current-password'), auth()->user()->password))) {
            // The passwords matches
			$this->flash('warning', 'Your current password does not matches with the password you provided. Please try again.');
			return redirect()->back();
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
			$this->flash('warning', 'New Password cannot be same as your current password. Please choose a different password.');
			return redirect()->back();
        }        
 
        //Change Password
        $user = auth()->user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();
 
		$this->flash('success', 'Password changed successfully');
        return redirect()->back();
	}



	public function view($id){
         
		$profile = User::findOrFail($id);

		return view('studio.profile.view', compact('profile'));
	}
}
