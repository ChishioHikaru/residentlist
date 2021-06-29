@extends('layouts.app')

@section('content')
    @if (Auth::check())
        
                @include('residents.index')
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>入居者リスト</h1>
            </div>
        </div>
        <br>
        <div class="text-center">
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}<br>
            <br>
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
      　<br>
　　　　<br>
        <footer class="text-center pt-3 border-top">
            &copy; 2021 Kims App Inc.
        </footer>
    @endif
@endsection
