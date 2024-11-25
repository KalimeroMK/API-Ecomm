@extends('admin::layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="content" style="margin-top: 7%">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{trans('messages.role')}}</h4>
                    <p class="card-category"><a href="{{ route('admin')}}">{{trans('messages.role')}}</a> -> <a
                                href="{{route('role.index')}}">{{trans('messages.settings')}}</a></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>@lang('partials.name'):</strong>
                                {{ $role->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>@lang('sidebar.permissions'):</strong> <br>
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $permission)
                                        <label class="label label-success">{{ $permission->name }}</label><br>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection