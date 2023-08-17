@extends('layouts.app')

@section('title', 'お問い合わせ確認画面')

@section('content')
    <form method="post" action="{{ route('contact.send') }}" class="row">
        @csrf
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-id-card-o"></i>　お名前</div>
                    <input disabled class="form-control" value="{{ $input['name'] }}">
                </div>
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-envelope"></i>　メールアドレス</div>
                    <input disabled class="form-control" value="{{ $input['email'] }}">
                </div>
            </div>
        </div>
        <div class="form-group col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-indent"></i>　タイトル</div>
                    <input disabled class="form-control" value="{{ $input['title'] }}">
                </div>
            </div>
        </div>
        <div class="form-group col-xs-12 mb-4">
            <textarea disabled rows="10" class="form-control">{{ $input['body'] }}</textarea>
        </div>
        <div class="form-group col-3">
            <div class="d-grid gap-2">
                <button type="submit" name="back" class="btn btn-outline-secondary btn-lg">
                    <i class="fa fa-mail-reply"></i>　フォームに戻る
                </button>
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
