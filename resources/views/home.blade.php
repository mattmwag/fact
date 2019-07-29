@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <form name="add_a_fact" method="POST" action="/facts">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <textarea name="text"></textarea><br/>
                        <button type="submit">Add A Fact</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
