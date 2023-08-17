@extends('layouts.app')

@section('title', 'お問い合わせ入力フォーム')

@section('content')

    @if ($errors->any())
        @include('common.errors')
    @endif

    <form method="post" action="{{ route('contact.post') }}" class="row">
        <!-- ディレクティブでCSRFを指定 -->
        @csrf

        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-id-card-o"></i>　お名前</div>
                    <input type="text" name="name" class="form-control bg-light" value="{{ old('name', isset($input->name) ? $input->name : '') }}" autofocus>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-envelope"></i>　メールアドレス</div>
                    <input type="text" name="email" class="form-control" value="{{ old('email', isset($input->email) ? $input->email : '') }}">
                </div>
            </div>
        </div>
        <div class="form-group col-xs-12">
            <div class="input-group mb-4">
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-indent"></i>　タイトル</div>
                    <input type="text" name="title" class="form-control" value="{{ old('title', isset($input->title) ? $input->title : '') }}">
                </div>
            </div>
        </div>
        <div class="form-group col-xs-12 mb-4">
            <textarea name="body" rows="10" class="form-control" placeholder="お問い合わせ本文">{{ old('body', isset($input->body) ? $input->body : '') }}</textarea>
        </div>
        <div class="form-group col-3">
            <div class="d-grid gap-2">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="fa fa-mail-reply"></i>　戻 る
                </a>
            </div>
        </div>
        <div class="form-group col-9">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary btn-lg">
                    <i class="fa fa-chevron-right"></i>　確 認
                </button>
            </div>
        </div>
    </form>
@endsection
