@extends('layouts.frontend')

@section('title')
    My Profile
@endsection

@section('content')
    <section class="" style="padding-top: 90px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>My Profile Page</h4>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <hr />
                            <form action="{{url('my-profile-update')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">First name</label>
                                            <input type="text" name="fname" class="form-control" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Last name</label>
                                            <input type="text" name="lname" class="form-control" value="{{Auth::user()->lname}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" readonly value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address 1 (FlatNo, Apt No & Address</label>
                                            <input type="text" name="address1" class="form-control" value="{{Auth::user()->address1}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address 2 (Landmark, near by)</label>
                                            <input type="text" name="address2" class="form-control" value="{{Auth::user()->address2}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">City</label>
                                            <input type="text" name="city" class="form-control" value="{{Auth::user()->city}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">State</label>
                                            <input type="text" name="state" class="form-control" value="{{Auth::user()->state}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Pin code / Zip code</label>
                                            <input type="text" name="pincode" class="form-control" value="{{Auth::user()->pincode}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Alternate Phone Number</label>
                                            <input type="text" name="alternate_phone" class="form-control" value="{{Auth::user()->alternate_phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" alt="" class="w-75">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection