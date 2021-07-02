@extends('layouts.app')

@section('content')
        
    <h1>滞納者一覧</h1>
    <br>

    @if (count($residents) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>支払い状況</th>
                    <th>ID</th>
                    <th>テナントNo.</th>
                    <th>名前</th>
                    <th>電話番号</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($residents as $resident)
                <tr>
                    <td>
                        {{-- 入金済ボタンのフォーム --}}
                        {!! Form::open(['route' => ['residents.delinquent', $resident->id]]) !!}
                            {!! Form::submit('入金済', ['class' => "btn btn-success btn-sm"]) !!}
                        {!! Form::close() !!}                        
                    </td>
                    <td>{!! link_to_route('residents.show', $resident->id, ['resident' => $resident->id]) !!}</td>
                    <td>{{ $resident->tenant_number }}</td>
                    <td width="150"height="20">{{ $resident->resident_name }}</td>
                    <td>{{ $resident->tel }}</td>
                    <td>{{ $resident->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{ $residents->links() }}

@endsection