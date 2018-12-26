@extends('layouts.app')
@section('content')
<div class="container" style="padding-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Infomation') }}</div>

                <div class="card-body">
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
                              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#password_modal">
                               {{__('Change Password')}} 
                              </button>
                              <!-- Modal -->
                              <div class="modal fade hide" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="password_modalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="password_modalTitle">{{__('Change Password')}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form method="POST" action="{{Route('password')}}" >
                                            @csrf
                                    <input id="email" type="hidden" name="email" value="{{Auth::user()->email }}">
                                    <div class="modal-body">
                                     <div class="form-group">
                                     <label for="n_password">{{__('New Password')}}</label>
                                     <input type="password" class="form-control{{ $errors->has('n_password') ? ' is-invalid' : '' }}" name="n_password" id="n_password" placeholder="Enter new password" require>
                                       @if ($errors->has('n_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('n_password') }}</strong>
                                            </span>
                                        @endif
                                     </div>
                                     <div class="form-group">
                                     <label for="cn_password">{{__('Confirm New Password')}}</label>
                                     <input type="password" class="form-control{{ $errors->has('cn_password') ? ' is-invalid' : '' }}" name="cn_password" id="cn_password" placeholder="Confirm new password" require>
                                       @if ($errors->has('cn_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cn_password') }}</strong>
                                            </span>
                                        @endif
                                     </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade"  id="change_status" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{__('Password Change')}}
                                    </div>
                                    <div class="modal-body">
                                        {{__('Your password\' changed complete. Please press close to logout.')}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" onclick="document.getElementById('logout-form').submit();">{{__('Close')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            if ({{ Request::old('password_modal','0')}} == 1) 
                            {
                                $('#password_modal').modal('show');
                            }
                            if ({{Request::old('change_status','0')}} != 1)
                                {$('#change_status').modal('hide');}
                            else
                                {$('#change_status').modal({
                                    show     : true,
                                    backdrop : 'static',
                                    keyboard : false
                                });}
                        </script>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#avatar_modal">
                                <img src="{{Auth::user()->avatar_url}}" class="mx-auto d-block" id="avatar"  width="100px" height="100px" alt=""><br/>
                                {{__('Change avatar')}}
                              </button>
                              <!-- Modal -->
                              <div class="modal fade" id="avatar_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title">{{__('Change your\'s avartar')}}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                          </div>
                                        <form method="POST" action="{{ Route('avatar') }}" enctype="multipart/form-data">
                                            <input id="email" type="hidden" name="email" value="{{Auth::user()->email }}">
                                            @csrf
                                          <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="n_avatar">{{__('Place your\'s avatar here')}}</label>
                                                    <input type="file" class="form-control-file {{ $errors->has('n_avatar') ? ' is-invalid' : '' }}" name="n_avatar" id="n_avatar" require>
                                                    @if ($errors->has('n_avatar'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('n_avatar') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="submit" class="btn btn-primary">{{__('Save change')}}</button>
                                          </div>
                                        </form>
                                        <script type="text/javascript">
                                            if ({{ Request::old('avatar_modal','0')}} == 1) 
                                            {
                                                $('#avatar_modal').modal('show');
                                            }
                                            // if ({{Request::old('change_status','0')}} != 1)
                                            // {$('#change_status').modal('hide');}
                                            // else
                                            // {$('#change_status').modal({
                                            //     show     : true,
                                            //     backdrop : 'static',
                                            //     keyboard : false
                                            // });}
                                        </script>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-outline-danger float-right" href="{{route('home')}}" role="button">Back</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
