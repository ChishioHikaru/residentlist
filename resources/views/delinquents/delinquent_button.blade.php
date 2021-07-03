@if (Auth::user()->is_delinquented($resident->id))
    {{-- 滞納者ボタンのフォーム --}}
    {!! Form::open(['route' => ['residents.undelinquent', $resident->id], 'method' => 'delete']) !!}
        {!! Form::submit('未入金', ['class' => "btn btn-danger btn-sm"]) !!}
    {!! Form::close() !!}        
@else
    {{-- 入金済みボタンのフォーム --}}
    {!! Form::open(['route' => ['residents.delinquent', $resident->id]]) !!}
        {!! Form::submit('入金済', ['class' => "btn btn-success btn-sm"]) !!}
    {!! Form::close() !!}                        
@endif
