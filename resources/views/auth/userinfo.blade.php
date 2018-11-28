@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Infomation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" readonly class="form-control-plaintext" name="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" readonly class="form-control-plaintext" name="email" value="{{Auth::user()->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                            <!-- Button trigger modal -->
                              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Change Password
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                     <div class="form-group">
                                       <label for="oldpassword">Old Password</label>
                                       <input type="password" class="form-control" name="opassword" id="opassword" placeholder="Enter old password" require>
                                     </div>
                                     <div class="form-group">
                                       <label for="oldpassword">New Password</label>
                                       <input type="password" class="form-control" name="npassword" id="npassword" placeholder="Enter new password" require>
                                     </div>
                                     <div class="form-group">
                                       <label for="oldpassword">Confirm New Password</label>
                                       <input type="password" class="form-control" name="cnpassword" id="cnpassword" placeholder="Confirm new password" require>
                                     </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                              <img src="{{Auth::user()->avatar_url}}" class="img-thumbnail rounded" alt="">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-outline-primary float-right" href="{{route('home')}}" role="button">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
