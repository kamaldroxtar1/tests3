<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;
Use App\Models\Users_table;
use PhpParser\Node\Expr\PostDec;

class tests3_controller extends Controller
{
    public function add()
    {
       return view('tests3.add');
    }

    // public function create()
    // {
    //      return view('tests3.create');
    // }

    public function store(Request $request)
    {
        $validate=$request->validate([
            'fname'=>'required',
            'lname'=>'required',
             'email'=>'required',
            'contact'=>'required|max:16|min:10|regex:/^([+]*[0-9]+)/',
            'city'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'status'=>'required',
            'photo'=>'required|mimes:jpg,png,jpeg'
        ],
        [
            'fname.required'=>'First name is required',
            'lname.required'=>'Last name is required',
            'email.required'=>'Email is required',
            'contact.required'=>'Contact is required',
            'contact.regex'=>'Incorrect format',
            'city.required'=>'City is required',
            'gender.required'=>'Gender is required',
            'age.required'=>'Age is required',
            'status.required'=>'Status is required',
            'photo.required'=>'Picture is required',
            'photo.mimes'=>'Only jpg , png and jpeg format supported',
        ]);
        if ($validate){
        $fname=$request->fname;
        $lname=$request->lname;
        $email=$request->email;
        $contact=$request->contact;
        $city=$request->city;
        $gender=$request->gender;
        $age=$request->age;
        $status=$request->status;
        $file=$request->file('photo');
        $dest=public_path('/uploads');
        $filename="Image-".rand()."-".time().".".$file->extension();
        if($file->move($dest,$filename))
        {
          $admin=new Users_table();
          $admin->first_name=$fname;
          $admin->last_name=$lname;
          $admin->email=$email;
          $admin->contact=$contact;
          $admin->city=$city;
          $admin->gender=$gender;
          $admin->age=$age;
          $admin->status=$status;
          $admin->photo=$filename;
          if($admin->save())
          {
            return back()->with('success','User added successfully');
          }
          else {
              $path=public_path()."uploads/".$filename;
              unlink($path);
              return back()->with('error','Registration Error');
          }
        }
        else {
            //Session::flash('errMsg','Uploading Error');
            return back()->with('error','Uploading Error');
        }
        }
    }

    public function show(Users_table $entries)
    {
        $entries=Users_table::all();
        return view('tests3.show',['entries'=>$entries]);
    }

    public function edit(Users_table $entries,$id)
    {
        $entries=Users_table::find($id); 
        return view('tests3.edit',['entries'=>$entries]);
    }

    
    public function update(Request $request,Users_table $entries, $id)
    {
        $fname=$request->firstname;
        $lname=$request->lastname;
        $email=$request->email;
        $contact=$request->contact;
        $city=$request->city;
        $gender=$request->gender;
        $age=$request->age;
        $status=$request->status;
        $file=$request->file('photo');
        $dest=public_path('/uploads');
        $filename="Image-".rand()."-".time().".".$file->extension();
        if($file->move($dest,$filename))
        {
          $admin=Users_table::find($id);
          $admin->first_name=$fname;
          $admin->last_name=$lname;
          $admin->email=$email;
          $admin->contact=$contact;
          $admin->city=$city;
          $admin->gender=$gender;
          $admin->age=$age;
          $admin->status=$status;
          $admin->photo=$filename;
          if($admin->save())
          {
              return redirect('/show');
          }
          else {
              $path=public_path()."uploads/".$filename;
              unlink($path);
              return back()->with('errMsg','Updation Error');
          }
        }
        else {
            //Session::flash('errMsg','Uploading Error');
            return back()->with('errMsg','Uploading Error');
        }

    }

    
    public function destroy($id)
    {
       $entries= Users_table::find($id);
       $path=public_path()."/uploads/".$entries->photo;
        unlink($path);
       $entries->delete();
       return redirect('/show');
    }
}
