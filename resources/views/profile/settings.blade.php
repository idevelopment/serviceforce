@extends('layouts.app')

@section('content')
{{-- Tab menu --}}
  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">
        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
          <span class="fa fa-user"></span> Change profile
        </a>
      </li>
      <li role="presentation">
        <a href="#security" aria-controls="security" role="tab" data-toggle="tab">
          <span class="fa fa-key"></span> Change password
        </a>
      </li>
    </ul>
  </div>
{{-- END menu --}}

{{-- Panels --}}
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{-- Tabs --}}
    <div class="tab-content">
      {{-- Profile information tab --}}
        <div role="tabpanel" class="tab-pane fade in active" id="profile">
          <form style="margin-top: 10px" class="form-horizontal" method="POST" action="{!! route('profile.update.information') !!}">
            {{-- CSRF TOKEN --}}
            {!! csrf_field() !!}

                                       <form class="form-horizontal" role="form">
                                           <h3 class="heading_a"><span class="heading_text">General info</span></h3>
                                           <div class="form-group">
                                               <label for="profile_username" class="col-sm-2 control-label">First name</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="profile_username" value="{{ $query->fname }}">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="profile_name" class="col-sm-2 control-label">Last Name</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="profile_name" value="{{ $query->name }}">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="profile_bday" class="col-sm-2 control-label">Birthdate</label>
                                               <div class="col-sm-10">
                                                   <input type="date" class="form-control" id="profile_bday" value="1984-03-16">
                                               </div>
                                           </div>
                                           <h3 class="heading_a"><span class="heading_text">Contact info</span></h3>
                                           <div class="form-group">
                                               <label for="profile_skype" class="col-sm-2 control-label">Skype</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="profile_skype" value="">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="profile_fb" class="col-sm-2 control-label">Mobile</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" value="">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="profile_email" class="col-sm-2 control-label">Email</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" value="{{ $query->email }}">
                                               </div>
                                           </div>
                                           <h3 class="heading_a"><span class="heading_text">Access info</span></h3>
                                           <div class="form-group">
                                               <label for="profile_notes" class="col-sm-2 control-label">Department</label>
                                               <div class="col-sm-10">
                                                 <p class="form-control-static">Devops</p>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="profile_notes" class="col-sm-2 control-label">Title</label>
                                               <div class="col-sm-10">
                                                 <p class="form-control-static">Senior Developer</p>
                                               </div>
                                           </div>
                                           <hr/>
                                           <div class="form-group">
                                               <div class="col-sm-10 col-sm-offset-2">
                                                   <button class="btn btn-primary">Save</button>
                                                   <button class="btn btn-danger">Cancel</button>
                                               </div>
                                           </div>
                                       </form>
        </div>
      {{-- END profile information tab --}}

      {{-- Account security tab --}}
        <div role="tabpanel" class="tab-pane fade in" id="security">
          <form style="margin-top: 10px;" class="form-horizontal" method="POST" action="{!! route('profile.update.credentials') !!}">
            {{-- CSRF TOKEN --}}
            {!! csrf_field() !!}

            {{-- Password form-group --}}
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
              <label for="password" class="col-md-2 control-label">
                Password: <strong class="text-danger"></strong>
              </label>
              <div class="col-md-6">
                  <input type="text" id="password" placeholder="Password" name="password" class="form-control">

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
            </div>

            {{-- Password confirmation form-group --}}
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
              <label for="password2" class="col-md-2 control-label">
                Confirm password: <strong class="text-danger">*</strong>
              </label>
              <div class="col-md-6">
                  <input type="text" id="password2" placeholder="Repeat password" name="password_confirmation" class="form-control">

                  @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <hr/>

            {{-- SUBMIT & RESET BUTTON --}}
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button class="btn btn-primary">Save</button>
                    <button class="btn btn-danger">Cancel</button>
                </div>
            </div>
          </form>
        </div>
      {{-- END account security tab --}}
    </div>
    {{-- END tabs --}}
  </div>
{{-- END Panels --}}
@endsection
