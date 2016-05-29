@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                {{-- Side panel --}}
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Settings </div>

                        <div class="list-group">
                            <a class="@if(Request::is('profile')) active @endif  list-group-item" href="">Profile configuration</a>
                            <a class="list-group-item" href="">Security</a>
                        </div>
                    </div>
                </div>
                {{-- End side panel --}}

                {{-- Content --}}
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Account settings </div>
                    </div>
                </div>
                {{-- End content --}}

            </div>
        </div>
    </div>
@endsection