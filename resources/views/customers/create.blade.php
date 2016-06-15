@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>New customer</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('customers.store') }}" method="post" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                    <label for="company" class="col-md-3 control-label">
                        {{trans('customers.company')}} <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="text" placeholder="Company name" name="company" id="company" value="{{ old('company') }}" class="form-control">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('vat') ? ' has-error' : '' }}">
                    <label for="vat" class="col-md-3 control-label">{{trans('customers.vat')}} <span
                                class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" name="vat" placeholder="VAT number" id="vat" value="{!! old('vat') !!}" class="form-control">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">
                        {{trans('customers.name')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="name" placeholder="Lastname" id="name" value="{{ old('name') }}" class="form-control">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('fname') ? ' has-error' : '' }}">
                    <label for="firstname" class="col-md-3 control-label">
                        {{trans('customers.first_name')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="fname" placeholder="Firstname" id="firstname" value="{{ old('fname')}}" class="form-control">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-3 control-label">
                        {{trans('customers.address')}} <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="address" placeholder="Address" id="address" value="{{ old('address')  }}" class="form-control">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('zipcode') ? ' has-error' : '' }}">
                    <label for="zipcode" class="col-md-3 control-label">
                        {{trans('customers.zipcode')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="zipcode" placeholder="Zipcode" id="zipcode" value="{{ old('zipcode') }}" class="form-control">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                    <label for="city" class="col-md-3 control-label">
                        {{trans('customers.city')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="City" class="form-control">
                    </div>
                </div>

                <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                    <label for="city" class="col-md-3 control-label">
                        {{trans('customers.country')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <select name="country" id="country" class="form-control">
                            <option value="" selected="">Select your country</option>
                            @foreach($countries as $c)
                                <option value="{!! $c->country !!}"> {!! $c->country !!} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group form-sep {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">
                        {{trans('customers.email')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="email" placeholder="Email" id="email" value="{{ old('email') }}" class="form-control">
                    </div>
                </div>

                <div class="form-group form-sep {{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="col-md-3 control-label">
                        {{trans('customers.phone')}}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="phone" id="phone" placeholder="Phone" value="{{ old('phone')  }}" class="form-control">
                    </div>
                </div>

                <div class="form-group form-sep {{ $errors->has('mobile') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">
                        {{trans('customers.mobile')}}
                    </label>
                    <div class="col-md-8">
                        <input type="text" name="mobile" id="mobile" placeholder="Mobile" value="{{ old('mobile') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">&nbsp;</label>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">{{ trans('app.save')}}</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection