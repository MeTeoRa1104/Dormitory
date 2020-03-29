@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Данные о комнате:</div>

                <div class="card-body">
                    @foreach($result as $res)
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Номер</label>
                            <div class="col-md-6">
                                <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->room_number}}" readonly="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Площадь</label>
                            <div class="col-md-6">
                                <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->room_square}}" readonly="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Вместимость</label>
                            <div class="col-md-6">
                                <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->room_emount_people}}" readonly="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Количество живущих людей</label>
                            <div class="col-md-6">
                                <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->  room_living_people}}" readonly="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Свободных мест</label>
                            <div class="col-md-6">
                                <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->room_free_place}}" readonly="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Этаж</label>
                            <div class="col-md-6">
                                <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->room_floor}}" readonly="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Общежитие</label>
                            <div class="col-md-6">
                                <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->      room_dormitory}}" readonly="true">
                            </div>
                        </div>
                       
                        
                    @endforeach  
                    
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped" >
            <thead class="thead-dark">
                <tr>
                  <th><label class='lab'>Фамилия</label></th>
                  <th><label class='lab'>Имя</label></th>
                   <th><label class='lab'>Отчество</label></th>
                   <th><label class='lab'>Телефон</label></th>
                   <th><label class='lab'>Место учёбы</label></th>
                      
                </tr>
            </thead>
           

@foreach($livers as $liv)
    <tr>
                  <td><label class='lab'>{{$liv->student_first_name}}</label></td>
                  <td><label class='lab'>{{$liv->student_second_name}}</label></td>
                   <td><label class='lab'>{{$liv->student_second_name}}</label></td>
                   <td><label class='lab'>{{$liv->student_phone}}</label></td>
                   <td><label class='lab'>{{$liv->student_study_place}}</label></td>
                       
                </tr>
@endforeach
@endsection
