@extends('layouts.app')

@section('content')

<h1>{{ $resident->resident_name }} さんの詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $resident->id }}</td>
        </tr>
        <tr>
            <th>テナントNo.</th>
            <td>{{ $resident->tenant_number }}</td>
        </tr>
        <tr>
            <th>名前</th>
            <td>{{ $resident->resident_name }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $resident->tel }}</td>
        </tr>
        <tr>
            <th>備考</th>
            <td>{{ $resident->content }}</td>
        </tr>
    </table>

    {!! link_to_route('residents.edit', 'この入居者を編集', ['resident' => $resident->id], ['class' => 'btn btn-light']) !!}
    <br></br>
    {!! Form::model($resident, ['route' => ['residents.destroy', $resident->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection