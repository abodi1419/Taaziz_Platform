@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

{{--            @if(auth()->user()->hasRole('employer-waiting list'))--}}
{{--                <div class="alert alert-warning" role="alert">--}}
{{--                    {{ __('You are currently in the waiting list, please contact the Faculty of Law to grant you permissions.') }}--}}
{{--                    <br>--}}
{{--                    {{ __('- You can visit the contact page -') }}--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body underline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
