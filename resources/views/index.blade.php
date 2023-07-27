@extends('dashboard')
@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
<div class="row">
    @include('frontend.body.dashboard_sidebar_menu')

<div class="col-md-9">
<div class="tab-content account dashboard-content pl-50">
<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Hello {{ Auth::user()->name }}</h3>
            <br>
              <img id="showImage" src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo):url('upload/no_image.jpg') }}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
        </div>
        <div class="card-body">
            <p>
                From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
            </p>
        </div>
    </div>
</div>

    <div class="card">
        <div class="card-header">
            <h5>Account Details</h5>
        </div>
        <div class="card-body">
            <p>Already have an account? <a href="page-login.html">Log in instead!</a></p>
            <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>User Name <span class="required">*</span></label>
                        <input required="" class="form-control" name="username" type="text" value="{{ $userData->username }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Full Name <span class="required">*</span></label>
                        <input required="" class="form-control" name="name" value="{{ $userData->name }}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email <span class="required">*</span></label>
                        <input required="" class="form-control" name="email" type="text" value="{{ $userData->email }}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Phone <span class="required">*</span></label>
                        <input required="" class="form-control" name="phone" type="text" value="{{ $userData->phone }}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Address <span class="required">*</span></label>
                        <input required="" class="form-control" name="address" type="text" value="{{ $userData->address }}" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>User Photo <span class="required">*</span></label>
                        <input class="form-control" name="photo" type="file"  id="image" />
                    </div>

                      <div class="form-group col-md-12">
                        <label>  <span class="required">*</span></label>
                        <img id="showImage" src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo):url('upload/no_image.jpg') }}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
                                    </div>
                                    <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Change Password</h5>
                                            </div>
                                            <div class="card-body">



                                            <form method="post" action="{{ route('user.update.password') }}" >
                                                    @csrf

                                             @if (session('status'))
                                             <div class="alert alert-success" role="alert">
                                                    {{session('status')}}
                                             </div>
                                             @elseif(session('error'))
                                             <div class="alert alert-danger" role="alert">
                                                {{session('error')}}
                                             </div>
                                             @endif


                                    <div class="row">

                                        <div class="form-group col-md-12">
                                            <label>Old Password <span class="required">*</span></label>
                                            <input  class="form-control @error('old_password') is-invalid @enderror"  name="old_password" type="password" id="current_password"    placeholder="Old Password"  />

                                            @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                          <div class="form-group col-md-12">
                                            <label>New Password <span class="required">*</span></label>
                                            <input  class="form-control @error('new_password') is-invalid @enderror"  name="new_password" type="password" id="new_password"   placeholder="New Password"  />

                                            @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                          <div class="form-group col-md-12">
                                            <label>Confirm New Password <span class="required">*</span></label>
                                            <input  class="form-control"  name="new_password_confirmation" type="password" id="new_password_confirmation"  placeholder="Confirm New Password"  />

                                        </div>



                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                        </div>
                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                                                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
