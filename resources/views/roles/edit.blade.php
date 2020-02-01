
@extends('layouts.app')
@section('content')
    @include('layouts.errors')
    <div class="container">
        {!! Form::model($role,['method'=>'PATCH','route'=>['roles.update',$role->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Name Of Role') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('display_name','Name') !!}
            {!! Form::text('display_name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','description') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">

            {!! Form::label('permission_list','permission') !!}
            <br>
            <input id="selectAll" type="checkbox">
            <label for='selectAll'>Select All</label>
            <br>
            @foreach($permission as $Permission)

                <label class="checkbox-inline col-sm-3">
                    <input type="checkbox"  name="permission_list[]" value="{{$Permission->id}}"
                    @if($role->hasPermission($Permission->name))
                        checked
                        @endif

                    > {{$Permission->display_name}}
                </label>
            @endforeach

        </div>
        <div class="form-group">
            {!! Form::submit('Add Role',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @push('scripts')
        <script>
            $("#selectAll").click(function(){
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

            });
        </script>
    @endpush
@endsection
