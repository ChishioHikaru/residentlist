@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>入居者管理</h1>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'ユーザー登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
       
    </div>
    
    <footer class="text-center pt-3 border-top">
        &copy; 2021 Kims App Inc.
    </footer>
@endsection
