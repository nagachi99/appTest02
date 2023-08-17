@extends('layouts.app')

@section('title', '送信完了')

@section('content')

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column text-dark bg-light rounded">

        <main class="px-3">
            <h3 class="fs-2 my-3">この度はお問い合わせいただき、誠にありがとうございました。</h3>
            <p class="lead">お客様にお送り頂いたフォームは無事送信されました。<br>
                お送りいただきました内容を確認の上、担当者より折り返しご連絡させていただきます。<br>
                その他の事項につきましては下記の記事をご確認くださいませ。</p>
            <div class="list-group my-4 fs-5">
                <a type="button" class="list-group-item list-group-item-action" href="https://reffect.co.jp/laravel"
                    target="_blank"><i class="fa fa-external-link"></i> Larvel機能追加チュートリアル</a>
                <a type="button" class="list-group-item list-group-item-action"
                    href="https://qiita.com/toontoon/items/c4d0371e504c37f6576e" target="_blank"><i
                        class="fa fa-external-link"></i> Larvelの機能まとめ</a>
                <a type="button" class="list-group-item list-group-item-action"
                    href="https://qiita.com/ucan-lab/items/9bed7aeb7d165bc26b2d" target="_blank"><i
                        class="fa fa-external-link"></i> 便利な拡張ライブラリ</a>
                <a type="button" class="list-group-item list-group-item-action"
                    href="https://github.com/alexeymezenin/laravel-best-practices/blob/master/japanese.md"
                    target="_blank"><i class="fa fa-external-link"></i> Laravelのベストプラクティスまとめ</a>
            </div>
            <p class="lead d-grid gap-12 my-2">
                <a href="{{ url('/') }}" class="btn btn-lg btn-secondary fw-bold border-dark bg-dark"><i
                        class="fa fa-mail-reply"></i>　トップに戻る</a>
            </p>
        </main>

    </div>
    <footer class="text-dark text-center mt-5">
        <p>Curriculum for <a href="https://hackmd.io/@arihito/HkXOw5UII">Kenshu</a>, by <a
                href="https://twitter.com/arihitter">@arihitter</a>.</p>
    </footer>

@endsection
