@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Задания</div>

                <div class="card-body">
                    <router-view name="TiketsIndex"></router-view>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
