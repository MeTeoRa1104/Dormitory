@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Отправка квитанции') }}</div>

                    <div class="card-body">
                        <form method="POST" action="domakeinvoice" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-7 col-form-label text-md-right">Фото квитанции</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12" style="text-align: center;">
                                    <input type="file" name="image" id="image" class="form-control">
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
