@extends('layouts.master')
@section('title', 'YSP Laravel')
@section('content')

<!-- 資料開始 -->

@if(!isset($msg))
    @php
        $msg = "";
    @endphp
@endif
@if(!isset($acc))
    @php
        $acc = "";
    @endphp
@endif

<h4>會員登入</h4>
<hr />
<div class="row">
    <div class="col-md-4">
        <form method="post" action="{{ url('Home/CheckLogin') }}">
            @csrf
            <div class="form-group">
                <label class="control-label">帳號</label>
                <input type="text" name="acc" value="{{ $acc }}" class="form-control" required />
            </div>
            <div class="form-group">
                <label class="control-label">密碼</label>
                <input type="password" name="pwd" class="form-control" />
            </div>
            <div class="form-group">
                <input type="submit" value="登入" class="btn btn-secondary" />
            </div>
        </form>
        <font color="red">{{ $msg }}</font>
    </div>
</div>

<!-- 資料結束 -->
@stop
