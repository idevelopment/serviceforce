@extends('layouts.app')

@section('content')
{{-- Tab menu --}}
  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">
        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
          <span class="fa fa-user"></span> Profiel info
        </a>
      </li>
      <li role="presentation">
        <a href="#security" aria-controls="security" role="tab" data-toggle="tab">
          <span class="fa fa-cogs"></span> Account beveiliging
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
                                               <label for="profile_username" class="col-sm-2 control-label">Username</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="profile_username" value="cClark">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="profile_name" class="col-sm-2 control-label">Name</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="profile_name" value="Carrol Clark">
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
                                                   <input type="text" class="form-control" id="profile_skype" value="carrol123">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="profile_fb" class="col-sm-2 control-label">Facebook</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="profile_fb" value="facebook.com/carrol23.clark">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label for="profile_email" class="col-sm-2 control-label">Email</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="profile_email" value="carrolC@yukon.adm">
                                               </div>
                                           </div>
                                           <h3 class="heading_a"><span class="heading_text">Other info</span></h3>
                                           <div class="form-group">
                                               <label for="profile_notes" class="col-sm-2 control-label">Notes</label>
                                               <div class="col-sm-10">
                                                   <textarea name="profile_notes" id="profile_notes" cols="30" rows="4" class="form-control">
           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dignissimos dolorem eius nemo ratione. Deserunt dicta dolor id illo magnam molestias pariatur praesentium! Asperiores dolor perspiciatis qui quisquam recusandae vero!
                                                   </textarea>
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

            {{-- Name form-group --}}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
              <label for="name" class="col-md-3 control-label">
                Name <strong class="text-danger">*</strong>
              </label>
              <div class="col-md-6">
                <input type="text" id="name" name="name" value="{{ $query->name }}" class="form-control">

                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            {{-- Email form-group --}}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="col-md-3 control-label">
                    Email: <strong class="text-danger">*</strong>
                </label>
                <div class="col-md-6">
                    <input type="text" id="email" name="email" value="{{ $query->email }}" class="form-control">

                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
            </div>


            {{-- SUBMIT & RESET button --}}
            <button type="submit" class="btn btn-success">Update</button>
            <button type="reset" class="btn btn-danger">Reset</button>

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
              <label for="password" class="col-md-3 control-label">
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
              <label for="password2" class="col-md-3 control-label">
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


            {{-- SUBMIT & RESET BUTTON --}}
            <button type="submit" class="btn btn-success">Update</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </form>
        </div>
      {{-- END account security tab --}}
    </div>
    {{-- END tabs --}}
  </div>
{{-- END Panels --}}
@endsection
