@extends('master')

@section('content')

<div class="container mt-3 col-md-5">
    <div class="bg-dark text-light">
        <h1 class="text-center pb-3 pt-3">Add User</h1>
    </div>
    @if(Session::has('success'))
                <div class="alert alert-success"> {{Session::get('success')}}</div>
            @endif
            <!-- for showing error messege. -->
            @if(Session::has('error'))
                <div class="alert alert-danger"> {{Session::get('error')}}</div>
            @endif
    <!--  -->
    <form class="container mt-4" method="POST" action="form_submit" id="form1" novalidate enctype="multipart/form-data">
        @csrf
        @if($errors->has('fname'))
                    <span class="btn btn-danger">{{$errors->first('fname')}}</span>
                    @endif
        <div class="form-group">
            <input type="text" class="form-control" placeholder="First Name" name="fname">
        </div>
        @if($errors->has('lname'))
                    <span class="btn btn-danger">{{$errors->first('lname')}}</span>
                    @endif

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Last Name" name="lname">
        </div>
        @if($errors->has('email'))
                    <span class="btn btn-danger">{{$errors->first('email')}}</span>
                    @endif

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email"  name="email">
        </div>
        @if($errors->has('contact'))
                    <span class="btn btn-danger">{{$errors->first('contact')}}</span>
                    @endif

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Contact No" name="contact">
        </div>
        @if($errors->has('city'))
                    <span class="btn btn-danger">{{$errors->first('city')}}</span>
                    @endif

        <div class="form-group">
            <input type="text" class="form-control" placeholder="City" name="city">
        </div>
        @if($errors->has('gender'))
                    <span class="btn btn-danger">{{$errors->first('gender')}}</span>
                    @endif

        <div class=" form-control">
            <div class="form-control col-md-3">Male: <input type="radio" name="gender" class="" value="male"></div>
            <div class="form-control col-md-3">Female: <input type="radio" name="gender" class="" value="female"></div>
        </div>
        @if($errors->has('age'))
                    <span class="btn btn-danger">{{$errors->first('age')}}</span>
                    @endif

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Age" name="age">
        </div>
        @if($errors->has('photo'))
                    <span class="btn btn-danger">{{$errors->first('photo')}}</span>
                    @endif

        <div class="form-group">
            <input type="file" class="form-control" placeholder="FILE Upload" name="photo">
        </div>
        @if($errors->has('status'))
                    <span class="btn btn-danger">{{$errors->first('status')}}</span>
                    @endif

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Status" name="status">
        </div>
        <br>
        <div class="form-group">
            <input type="submit" class="form-control col-md-4 btn btn-success" value="Add User" name="submit">
            <a href="show" class="btn btn-info"> Show Users</a>
        </div>
    </form>
    <!--  -->
</div>
<script>
$(document).ready(function(){
    if($('#form1').length>0){
        $('#form1').validate({
            rules:{
                fname:{
                    required:true,
                    maxlength:10
                },
                lname:{
                    required:true,
                    maxlength:10
                },
                email:{
                    required:true,
                    maxlength:50,
                    email:true
                },
                conatct:{
                    required:true,
                    maxlength:16
                },
                city:{
                    required:true,
                    maxlength:20
                },
                age:{
                    required:true,
                    maxlength:3
                },
                status:{
                    required:true,
                    maxlength:15
                }
            },
            messages:{
                fname:{
                    required:'enter first name',
                    maxlength:'maximum length should be 10'
                },
                lname:{
                    required:'enter last name',
                    maxlength:'maximum length should be 10'
                },
                email:{
                    required:'enter your email',
                    maxlength:'maximum length should be 50',
                    email:'enter valid email'
                },
                conatct:{
                    required:'enter your contact',
                    maxlength:'maximum length should be 16'
                },
                city:{
                    required:'enter your city',
                    maxlength:'maximum length should be 20'
                },
                age:{
                    required:'enter your age',
                    maxlength:'age should not exceed 100'
                },
                status:{
                    required:'enter your status',
                    maxlength:'maximum length should be 15'
                }
            }
        })
    }
})
</script>
@endsection