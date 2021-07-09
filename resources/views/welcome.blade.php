@extends('layouts.app')

@section('content')
    @if (Auth::check())
        
                @include('residents.index')
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>入居者管理アプリ</h1>
            </div>
        </div>
        <br>
        <div class="text-center">
            <div style="margin-bottom:10px;">
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}<br>
            </div>
            <div style="margin-bottom:10px;">
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div style="margin-bottom:10px;">
            <div>
                {{--link_to_route('login.twitter', 'Twitterログイン', [], ['class' => 'btn btn-lg btn-primary']) --}}
                {{--<a href="{{ route('login.twitter') }}"><i class="fab fa-twitter"></i> Twitterでログイン</a> --}}
            </div>
        </div>
      　<br>
　　　　<br>
        <footer class="text-center pt-3 border-top">
            &copy; 2021 Kims App Inc.
        </footer>
    @endif
@endsection
