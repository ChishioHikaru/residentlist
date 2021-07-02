@if (Auth::user()->is_delinquenting($residents->id))
    {{-- 滞納者ボタンのフォーム --}}
    {!! Form::open(['route' => ['residents.delinquents', $is_delinquented->id], 'method' => 'delete']) !!}
        {!! Form::submit('未入金', ['class' => "btn btn-success btn-sm"]) !!}
    {!! Form::close() !!}
@else
    {{-- 入金済みボタンのフォーム --}}
    {!! Form::open(['route' => ['residents.delinquents', $is_delinquented->id]]) !!}
        {!! Form::submit('入金済', ['class' => "btn btn-light btn-sm"]) !!}
    {!! Form::close() !!}
@endif
