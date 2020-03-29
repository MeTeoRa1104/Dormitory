@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Данные о студенте:</div>

                    <div class="card-body">
                        @foreach($result as $res)
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Фамилия</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->student_first_name}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Имя</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->student_second_name}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Отчество</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->student_last_name}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Год рождения</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->student_year_of_birth}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Пол</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->student_gender}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Регион</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->student_region}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Адрес</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->  student_address}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">email</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->student_email}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Телефон</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->  student_phone}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Баланс</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="room" id="room" value="{{$res->student_debt}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">ИНН</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->  student_pin}}" readonly="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Телефон</label>
                                <div class="col-md-6">
                                    <input size="50" style ="text-align: center;" name="student_last_name" value="{{$res->  student_status}}" readonly="true">
                                </div>
                            </div>
                            <form action="aboutroom" method="POST">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Общежитие</label>
                                    <div class="col-md-6">
                                        <input size="50" style ="text-align: center;" name="dormitory" id="dormitory" value="{{$res->student_dormitory}}" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Комната</label>
                                    <div class="col-md-6">
                                        <input size="50" style ="text-align: center;" name="room" id="room" value="{{$res->student_room}}" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input size="50" style ="text-align: center;"  value="Перейти к комнате" type="submit">
                                    </div>
                                </div>

                            </form>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
