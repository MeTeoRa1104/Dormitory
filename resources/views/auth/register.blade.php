@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="student_first_name" class="col-md-4 col-form-label text-md-right">{{ __('Фамилия*') }}</label>

                            <div class="col-md-6">
                                <input id="student_first_name" type="text" class="form-control{{ $errors->has('student_first_name') ? ' is-invalid' : '' }}" name="student_first_name" value="{{ old('student_first_name') }}" required autofocus>

                                @if ($errors->has('student_first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_last_name" class="col-md-4 col-form-label text-md-right">{{ __('Отчество') }}</label>

                            <div class="col-md-6">
                                <input id="student_last_name" type="text" class="form-control{{ $errors->has('student_last_name') ? ' is-invalid' : '' }}" name="student_last_name" value="{{ old('student_last_name') }}" required autofocus>

                                @if ($errors->has('student_last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_gender" class="col-md-4 col-form-label text-md-right">{{ __('Пол*') }}</label>

                            <div class="col-md-6">
                                <input id="student_gender" type="text" class="form-control{{ $errors->has('student_gender') ? ' is-invalid' : '' }}" name="student_gender" value="{{ old('student_gender') }}" required autofocus>

                                @if ($errors->has('student_gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_year_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Год рождения*') }}</label>

                            <div class="col-md-6">
                                <input type ="date" id="student_year_of_birth" type="text" class="form-control{{ $errors->has('student_year_of_birth') ? ' is-invalid' : '' }}" name="student_year_of_birth" value="{{ old('student_year_of_birth') }}" required autofocus>

                                @if ($errors->has('student_year_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_year_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_priviliege" class="col-md-4 col-form-label text-md-right">{{ __('Льгота*') }}</label>

                            <div class="col-md-6">
                                <input type ="text" id="student_priviliege" type="text" class="form-control{{ $errors->has('student_priviliege') ? ' is-invalid' : '' }}" name="student_priviliege" value="{{ old('student_priviliege') }}" required autofocus>

                                @if ($errors->has('student_priviliege'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_priviliege') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_address" class="col-md-4 col-form-label text-md-right">{{ __('Адрес*') }}</label>

                            <div class="col-md-6">
                                <input id="student_address" type="text" class="form-control{{ $errors->has('student_address') ? ' is-invalid' : '' }}" name="student_address" value="{{ old('student_address') }}" required autofocus>

                                @if ($errors->has('student_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_region" class="col-md-4 col-form-label text-md-right">{{ __('Регион*') }}</label>

                            <div class="col-md-6">
                                <input id="student_region" type="text" class="form-control{{ $errors->has('student_region') ? ' is-invalid' : '' }}" name="student_region" value="{{ old('student_region') }}" required autofocus>

                                @if ($errors->has('student_region'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_pin" class="col-md-4 col-form-label text-md-right">{{ __('ИНН*') }}</label>

                            <div class="col-md-6">
                                <input id="student_pin" type="text" class="form-control{{ $errors->has('student_pin') ? ' is-invalid' : '' }}" name="student_pin" value="{{ old('student_pin') }}" pattern="[0-9]{14}" required autofocus>

                                @if ($errors->has('student_pin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_pin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="student_faculty" class="col-md-4 col-form-label text-md-right">{{ __('Факультет*') }}</label>

                                <div class="col-md-6">
                                <select class="form-control" name="student_faculty" id="student_faculty">
                                    <option>Факультет информационных технологий</option>
                                    <option>Технологический факультет</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="student_group" class="col-md-4 col-form-label text-md-right">{{ __('Группа*') }}</label>

                                <div class="col-md-6">
                                    <input type ="text" id="student_group" type="text" class="form-control{{ $errors->has('student_group') ? ' is-invalid' : '' }}" name="student_group" value="{{ old('student_group') }}" required autofocus>

                                    @if ($errors->has('student_group'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('student_group') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_phone" class="col-md-4 col-form-label text-md-right">{{ __('Телефон*') }}</label>

                            <div class="col-md-6">
                                <input id="student_phone" type="text" class="form-control{{ $errors->has('student_phone') ? ' is-invalid' : '' }}" name="student_phone" value="{{ old('student_phone') }}" required autofocus>

                                @if ($errors->has('phstudent_phoneone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Подтверждение пароля*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="check_access" class="col-md-4 col-form-label text-md-right">{{ __('Даю разрешение на обработку персональных данных') }}</label>

                            <div class="col-md-6">
                                <input id="check_access" type="checkbox"  name="check_access" required>

                                @if ($errors->has('check_access'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('check_access') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label id="text" name="text">Обязательные поля помечены знаком *</label>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Регистрация') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
