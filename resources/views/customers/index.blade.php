@extends('layouts.app')
@section('content')
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Customers</a></li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('customers.search') }}</div>
                    <div class="panel-body">
                        <form action="{{ url('customers') }}" method="post" class="form-horizontal">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company"
                                               class="col-md-3 control-label">{{trans('customers.company')}}</label>
                                        <div class="col-md-8">
                                            <input type="text" id="company" name="company" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="firstname"
                                               class="col-md-3 control-label">{{trans('customers.first_name')}}</label>
                                        <div class="col-md-8">
                                            <input type="text" id="firstname" name="firstname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="email" class="col-md-3 control-label">{{trans('customers.email')}}</label>
                                        <div class="col-md-8">
                                            <input type="text" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone"
                                               class="col-md-3 control-label">{{trans('customers.vat')}}</label>
                                        <div class="col-md-8">
                                            <input type="text" id="phone" name="phone" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name"
                                               class="col-md-3 control-label">{{trans('customers.name')}}</label>
                                        <div class="col-md-8">
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name"
                                               class="col-md-3 control-label">{{trans('customers.phone')}}</label>
                                        <div class="col-md-8">
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                    </div>                                    
                                </div>
                            </div
                            >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">&nbsp;</label>
                                        <div class="col-md-8">
                                            <button type="submit" name="search" id="search"
                                                    class="btn btn-sm btn-primary">{{ trans('app.search')}}</button>
                                            <button type="button"
                                                    onclick="location.href='{{url('customers/register')}}';"
                                                    class="btn btn-sm btn-default">{{ trans('customers.register')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('customers.recent') }}</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>{{trans('customers.company')}}</th>
                            <th>{{trans('customers.contact')}}</th>
                            <th>{{trans('customers.phone')}}</th>
                            <th>{{trans('app.dateregistered')}}</th>
                            <th class="col-md-1"></th>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer_item)
                                <tr>
                                    <td><a href="javascript:;">{{ $customer_item->company }}</a></td>
                                    <td>
                                        <a href="javascript:;">{{ $customer_item->fname }} {{ $customer_item->name }}</a>
                                    </td>
                                    <td><a href="callto:{{$customer_item->phone}}">{{ $customer_item->phone }}</a></td>
                                    <td><span class="text-center">{{ $customer_item->created_at }}</span></td>
                                    <td><a href="{{url('/customers/display/')}}/{{ $customer_item->id }}"
                                           data-toggle="tooltip" data-placement="bottom"
                                           title="{{ trans('app.details')}}"><i class="fa fa-info-circle fa-lg"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
