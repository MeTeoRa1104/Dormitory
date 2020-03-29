@extends('layouts.app')
@section('content')
    <table class="table table-bordered table-striped" >
        <thead class="thead-dark">
        <tr>
            <th><label class='lab'>Студент</label></th>
            <th><label class='lab'>Текст</label></th>
        </tr>
        </thead>

        @foreach($result as $res)
            <tr>
                <td><label class='lab'>{{$res->student_id}}</label></td>
                <td><label class='lab'>{{$res->request_text}}</label></td>
            </tr>
    @endforeach
@endsection
