@extends('layouts.master')
@section('title', 'Home/index')
@section('content')

<!-- 資料開始 -->
<style>
/* Add your custom styles here */
</style>

<div class="flex-center position-ref full-height">
      <div class="content">
            HOME Controller / Index  <br>
            <a href="{{ url('Home/Login') }}" class="btn btn-success mb-2">Login</a>
      </div>
</div>

<!-- 資料結束 -->
@stop
