@extends('layouts.app')

@section('title', '書籍新規追加')

@section('content')

    <form action="{{ url('books') }}" method="post" class="row" formnovalidate>

        <!-- トークンを自動発行し受け取り側で認証を行う(formの送信では必須) -->
        {{ csrf_field() }}

        @include('common.errors')

        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-book"></i>　書籍名</div>
                </div>
                <input type="text" name="item_name" class="form-control" value="{{ old('item_name') }}" autofocus>
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-sort-numeric-asc"></i>　購入数</div>
                </div>
                <select class="custom-select form-control" name="item_purchase">
                    <option>選択してください</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ old('item_purchase') == $i ? 'selected' : '' }}>
                            {{ $i }}冊</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-money"></i>　料　金</div>
                </div>
                <input type="number" name="item_amount" class="form-control" placeholder="例：3000"
                    value="{{ old('item_amount') }}">
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-calendar-o"></i>　販売日</div>
                </div>
                <input type="datetime-local" name="published" class="form-control datetimepicker-input"
                    value="{{ old('published') }}" id="datetimepicker" data-toggle="datetimepicker"
                    data-target="#datetimepicker">
            </div>
        </div>
        <div class="form-group col-3">
            <div class="d-grid gap-2">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="fa fa-mail-reply"></i>　キャンセル
                </a>
            </div>
        </div>
        <div class="form-group col-9">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary btn-lg">
                    <i class="fa fa-chevron-right"></i>　送 信
                </button>
            </div>
        </div>
    </form>

@endsection
