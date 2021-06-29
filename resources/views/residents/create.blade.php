@extends('layouts.app')

@section('content')

<h1>入居者の登録</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($resident, ['route' => 'residents.store']) !!}

                <div class="form-group">
                    {!! Form::label('tenant_number', 'テナントNo.:') !!}
                    {!! Form::text('tenant_number', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('resident_name', '名前:') !!}
                    {!! Form::text('resident_name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tel', '電話番号:') !!}
                    {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '備考:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection