@extends('layouts.app')
@section('content')
<div class="container">
        <input type="text" size="50" name="studentsearch_input" id="studentsearch_input" placeholder="Введите фамилию для поиска">
        </div>
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
            <tbody id="searchstudent_result">
               
            </tbody>
        </table>
@endsection