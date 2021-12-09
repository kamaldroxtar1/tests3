@extends('master')
@section("content")
<div class="header">
    <div class="container text-right mt-3">
        <a href="add" class="btn btn-success">Add User</a>
    </div>
</div>

<br>
<div id="result" style="width:max-content">
        <div class="mt-5">
            <div class="header text-center bg-dark text-light">
                <h2 class="pt-2 pb-2">Lists of Users.</h2>
            </div>
                <table class="table table-bordered">
                    <tr>
                        <th>S.no</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>City</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @php
                    $sno=1;
                    @endphp
                    @foreach($entries as $entry)
                    <tr>
                        <td>{{$sno}}</td>
                        <td>{{$entry->first_name}}</td>
                        <td>{{$entry->last_name}}</td>
                        <td>{{$entry->email}}</td>
                        <td>{{$entry->contact}}</td>
                        <td>{{$entry->city}}</td>
                        <td>{{$entry->gender}}</td>
                        <td>{{$entry->age}}</td>
                        <td>{{$entry->status}}</td>
                        <td> <img height="50px" width="50px" src="{{URL::asset('/uploads/'.$entry->photo)}}" alt="image"> </td>
                        <td class="">
                            <a href="/delete/{{$entry->id}}" class="btn btn-danger ">Delete</a>
                            <a href="/edit/{{$entry->id}}" class="btn btn-success ">Update</a>
                        </td>
                    </tr>
                    @php 
                    $sno+=1;
                    @endphp
                    @endforeach
                </table>

        </div>

</div>
@endsection