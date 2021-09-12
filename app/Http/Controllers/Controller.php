<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Ad;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\AdUpdateRequest;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\AdRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Exceptions\InvalidOrderException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login()
    {
        return view("login");
    }
    public function signup()
    {
        return view("signup");
    }
    public function index()
    {
        $ads = User::getAllAds();
            // dd($ads->items);
        return view('home',compact('ads'));
        // dd(Auth::user());
    }
    public function create(ProfileRequest $request)
    {

            $user = User::create([
            'email'=>$request->email,
            'password'=>$request->password,
            'user_name'=>$request->user_name,
            'phone_no'=>$request->phone_no
            ]);
            $user->save();
            return Redirect('login')->with('success','Your account was created Successfully!');
    }
    public function verifyUser(Request $request)
    {
        //dd($request->all());
        // dd('daw');
        $user = User::authenticateUser($request->email,$request->password);
        // dd($user[0]);
        if($user->count()>0)
        {
            Auth::login($user[0]);
            if(Auth::user()->user_type == 'user')
            {
                return redirect()->route('home');
            }
            else if(Auth::user()->user_type == 'admin')
            {

                return redirect()->route('adminHome');
            }

        }
        else
        {
            return Redirect::back()->withErrors(['Invalid Credentials']);
        }

    }
    public function unApproveAd(Request $request,$id)
    {
        $ad = Ad::find($id);
        // dd($ad->status);
        $ad->status = ('deleted');
        $ad->update();
        // dd($ad);
        return redirect()->back()->with('success','Ad Unapproved Successfully!!');
    }
    public function adminHome(Request $request)
    {
        $ads = Ad::all()->where('status','pending');
        $users = User::all()->where('user_type','user');
        // dd($users);
        $deleted = Ad::all()->where('status','deleted');
        return view('adminHome',compact('ads', 'users','deleted'));
        // dd($request);
    }
    public function viewProduct(Request $request,$id)
    {
        // dd($request->all());
        $product = Ad::find($request->id);

        // dd($product);
        $user = User::find($product->user_id);
        return view ('product-view',compact('product','user'));
        // dd($user);
    }
    public function productOwner(Request $request,$id)
    {
        // dd($id);
        $user= User::find($id);
        // dd($user);
        return view('userProfile',compact('user'));
    }
    public function addPost()
    {
            return view('addpost');
    }
    public function createPost(AdRequest $request)
    {
        // dd(Auth::user()->id);
        $imageName = time().'.'.$request->profile_picture->extension();
        // dd(($imageName));
         $request->profile_picture->move(public_path('images'), $imageName);
        $status='pending';
        // dd($request->profile_picture);
        // $imageName = time().'.'.
        $ad=(
        [
            'profile_picture'=>$imageName,
            'title'=>$request->title,
            'description'=>$request->description,
            'condition'=>$request->condition,
            'location'=>$request->location,
            'status'=>$status,
            'user_id'=>Auth::user()->id
       ]);
        $ad = Ad::create($ad);
        // dd($ad);
        if($ad)
        {
            return redirect('home')->with('success','Your ad has been sent for approval successfully');
        }
        else
        {
            return redirect()->back()->withErrors('error','There was an error posting your ad');
        }
        // dd($request);
    }
    public function editPost(Request $request,$id)
    {
        $product = Ad::find($id);
        // dd($product);
        // dd($product);
        if($product->user_id==Auth::user()->id)
        {
            return view('edit-product-view',compact('product'));
        }
        else
        {
            return redirect('home')->withErrors('You Cant edit someone elses post');
        }
        // dd($ad);
    }
    public function updatePost(AdUpdateRequest $request,$id)
    {
        // $

        $ad = Ad::find($id);
        // dd($ad);
        $ad->title = $request->title;
        $ad->location = $request->location;
        $ad->description = $request->description;
        $ad->condition = $request->condition;
        // $ad = Ad::find($id);
        // dd($ad->status);
        $ad->status = ('pending');
        $ad->update();
        // dd($ad);
        return redirect()->route('home')->with('success','Ad sent for approval successfully!!');
        // $ad->save();
        // if($ad)
        // {
        //      return redirect()->back()->with('success','Post Content Updated Successfully!!');
        // }
        // else
        // {
        //     return redirect()->back()->withErrors('Couldnt update post');
        // }

        // $update = Ad::update()
        // dd($request);
    }
    public function updatePostProfilePicture(Request $request,$id)
    {
        // dd($request->profile_picture);
        if(isset($request->profile_picture)==false){
            return redirect()->back()->withErrors('Please select a picture');
        }
        $ad = Ad::find($id);
        // dd($ad->profile_picture);
        $path = public_path('/Images/'.$ad->profile_picture);
        // dd($path);
        // if($path)
        if(File::exists($path))
        {
            if($ad->profile_picture != "dummy.jpg")
            {
                        File::delete($path);
            }

            $imageName = time().'.'.$request->profile_picture->extension();
            // dd(($imageName));
            $request->profile_picture->move(public_path('images'), $imageName);
            $ad->profile_picture = $imageName;
            $ad->save();
            if($ad->save())
            {
                 return redirect()->back()->with('success','Picture Updated SuccessFully');
            }
            else
            {
                return redirect()->back()->withErrors('Could not update picture');
            }
        }
        else
        {
            $imageName = time().'.'.$request->profile_picture->extension();
                // dd(($imageName));
                $request->profile_picture->move(public_path('images'), $imageName);
                $ad->profile_picture = $imageName;
                $ad->save();
                if($ad->save())
                {
                    return redirect()->back()->with('success','Picture Updated SuccessFully');
                }
                else
                {
                    return redirect()->back()->withErrors('Could not update picture');
                }
        }

        // dd(File::exists($path));
        // dd($request->profile_picture);
    }
    public function editProfile(Request $request,$id)
    {
        $user=User::find($id);

        return view('edit-profile',compact("user"));
    }
    public function updateProfile(ProfileEditRequest $request ,$id)
    {
        $user = User::find($id);
        $user->update($request->all());
        if($user->update())
        {
            return redirect()->back()->with('success','Profile Updated SuccessFully');

        }
        else
        {
            return redirect()->back()->withErrors('Could not update profile');
        }
    }

    public function updateUserProfilePicture(Request $request, $id)
    {
        if(isset($request->profile_picture)==false){
            return redirect()->back()->withErrors('Please select a picture');
        }
        // dd($request->all());
         $ad = User::find($id);
        // dd($ad);
        $path = public_path('Images/'.$ad->profile_picture);
        // dd($path);
        // if($path)
        if(File::exists($path))
        {
            // dd('exists');
            if($ad->profile_picture!=='dummy.jpg')
            {
                // dd('delete');
                File::delete($path);
            }
                // dd('not delete');
                $imageName = time().'.'.$request->profile_picture->extension();
                // dd(($imageName));
                $request->profile_picture->move(public_path('images'), $imageName);
                $ad->profile_picture = $imageName;
                $ad->save();
                if($ad->save())
                {
                    return redirect()->back()->with('success','Picture Updated SuccessFully');
                }
                else
                {
                    return redirect()->back()->withErrors('Could not update picture');
                }
        }
        else
        {
            $imageName = time().'.'.$request->profile_picture->extension();
                // dd(($imageName));
                $request->profile_picture->move(public_path('images'), $imageName);
                $ad->profile_picture = $imageName;
                $ad->save();
                if($ad->save())
                {
                    return redirect()->back()->with('success','Picture Updated SuccessFully');
                }
                else
                {
                    return redirect()->back()->withErrors('Could not update picture');
                }
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
        // dd($request);
    public function deleteAd(Request $request,$id)
    {
        $ad = Ad::find($id);
        $ad->delete();
        return redirect()->back()->with('success','Ad deleted successfully!!');
    }
    public function deleteUserAd(Request $request, $id)
    {
            $ad = Ad::find($id);
            $ad->delete();
            return redirect()->route('home')->with('success','Ad deleted successfully!!');
            // return redirect()->back()->with('success','Ad deleted successfully!!');
    }
    public function updateAdStatus(Request $request,$id)
    {
        $ad = Ad::find($id);
        // dd($ad->status);
        $ad->status = ('approved');
        $ad->update();
        // dd($ad);
        return redirect()->back()->with('success','Ad approved successfully!!');
    }
    public function addToPending(Request $request,$id)
    {
            $ad = Ad::find($id);
        // dd($ad->status);
        $ad->status = ('pending');
        $ad->update();
        // dd($ad);
        return redirect()->back()->with('success','Status Updated successfully!!');

    }

}
