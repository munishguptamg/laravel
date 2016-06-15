@extends('layouts.app')

@section('content')
<div class="container">
    <?php
        for ($i=0; $i < count($data); $i++) { 
    ?>
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <img src="{{ $data->imgPath }}" >
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            Total Comments: {{ $data->comments->count() }}
        </div>
        <div class="col-md-4">
            <a href="/addComments/{{ $data->id }}" id="Comments"> Add Comments </a>
        </div>
        <div class="col-md-4">
            <a href="/showComments/{{ $data->id }}" id="showComments"> Show Comments </a>
        </div>
    </div>
    <br>
    <br>
    <?php
        }
    ?>
</div>
@endsection