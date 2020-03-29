@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Заявка') }}</div>

                    <div class="card-body">
                        <form method="POST" action="makestudentrequest">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-7 col-form-label text-md-right">Текст заявки</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12" style="text-align: center;">
                                    <textarea name="requesttext" id="requesttext" style="width: 500px; height: 200px; resize: none;"  placeholder="Введите текст вашей заявки здесь"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12" style="text-align: center;">
                                    <input type="submit" class ="btn btn-success" value="Отправить">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
