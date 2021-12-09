@extends('master')

@section('content')
<div class="row">
    <div class="col-md-8">
        <br>
        <h3 aling="center"> Update Users.</h3>
        <br>
        <form action="/update/{{$entries->id}}" method="POST" id="form2" enctype="multipart/form-data"> 
            @csrf
            <div class="form-group"><input type="text" name="firstname" class="form-control" value={{$entries->first_name}}></div>
            <div class="form-group"><input type="text" name="lastname" class="form-control" value={{$entries->last_name}}></div>
            <div class="form-group"><input type="text" name="email" class="form-control"value={{$entries->email}} ></div>
            <div class="form-group"><input type="text" name="contact" class="form-control" value={{$entries->contact}} ></div>
            <div class="form-group"><input type="text" name="city" class="form-control" value={{$entries->city}}></div>
            <div class=" form-control">
                <div class="form-control col-md-1">Male:  <input type="radio" name="gender" class="" value="male"></div>
                <div class="form-control col-md-2">Female:  <input type="radio" name="gender" class="" value="female"></div>
            </div>
            <div class="form-group"><input type="text" name="age" class="form-control" value={{$entries->age}} ></div>
            <div class="form-group"><input type="file" name="photo" class="form-control"></div>
            <div class="form-group"><input type="text" name="status" class="form-control" value={{$entries->status}} ></div>
            <div class="form-group">
                <input type="submit" value="Update" name="update" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function(){
    if($('#form2').length>0){
        $('#form2').validate({
            rules:{
                firstname:{
                    required:true,
                    maxlength:10
                },
                lastname:{
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
                firstname:{
                    required:'enter first name',
                    maxlength:'maximum length should be 10'
                },
                lastname:{
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