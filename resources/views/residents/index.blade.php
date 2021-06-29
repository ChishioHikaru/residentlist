@extends('layouts.app')

@section('content')
        
    <h1>入居者一覧</h1>
    <br>

    @if (count($residents) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
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
                    <td>{!! link_to_route('residents.show', $resident->id, ['resident' => $resident->id]) !!}</td>
                    <td>{{ $resident->tenant_number }}</td>
                    <td>{{ $resident->resident_name }}</td>
                    <td>{{ $resident->tel }}</td>
                    <td>{{ $resident->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {!! link_to_route('residents.create', '入居者の登録', [], ['class' => 'btn btn-primary']) !!}
    <br></br>
    {{ $residents->links() }}

@endsection
