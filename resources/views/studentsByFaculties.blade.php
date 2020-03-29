@extends('layouts.app')
@section('content')
  <table class="table table-bordered table-striped" >
    <thead class="thead-dark">
        <tr>
          <th><label class='lab'>Фамилия</label></th>
          <th><label class='lab'>Имя</label></th>
          <th><label class='lab'>Отчество</label></th>
          <th><label class='lab'>Телефон</label></th>
          <th><label class='lab'>Место учёбы</label></th>
          <th><label class='lab'>Общежитие</label></th>
          <th><label class='lab'>Комната</label></th>     
          </tr>
    </thead>
        <tbody>
          @foreach($result as $res)
                    <tr >
                        <td>
                          <form action='aboutstudent' method='POST'>
                            {{csrf_field()}}
                            <input type='submit' value='перейти'>
                            <label id='first_name' class='lab'>{{$res->student_first_name}}</label>
                            <input name='idob' id='idob' type='hidden' value="{{$res->student_id}}">
                          </form>
                        </td>
                        <td><label class='lab'>{{$res->student_second_name}}</label></td>
                        <td><label class='lab'>{{$res->student_last_name}}</label></td>
                        <td><label class='lab'>{{$res->student_phone}}</label></td>
                        <td><label class='lab'>{{$res->student_faculty}}</label></td>
                        <td><label class='lab'>{{$res->student_dormitory}}</label></td>
                        <td><label class='lab'>{{$res->student_room}}</label></td>
                    </tr>
          @endforeach
        </tbody>
  </table>
@endsection