@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>入居者管理</h1>
            </div>
        </div>
    @endif
        <div class="text-center">
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            <br>
            <br>
            {{-- ログインページへのリンク --}}
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
        <br>
        <br>
        
    <footer class="text-center pt-3 border-top">
        &copy; 2021 Kims App Inc.
    </footer>
@endsection
