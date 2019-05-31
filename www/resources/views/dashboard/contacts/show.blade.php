@extends('layouts.admin')

@section('content')
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Просмотр сообщения</h4>
        </div>
        <div class="widget-body">
            <form class="needs-validation" method="post">
                @csrf

                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Название</label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" value="{{ $result->name }}" disabled="true">
                    </div>
                </div>

                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Сообщение</label>
                    <div class="col-lg-7">
                        <textarea class="form-control" disabled="true">{{$result->description}}</textarea>
                    </div>
                </div>

                <div class="em-separator separator-dashed"></div>

                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">Keywords</label>
                    <div class="col-lg-7">
                        <textarea class="form-control" name="reply" placeholder="Ответ ..." required=""></textarea>
                    </div>
                </div>

                <div class="em-separator separator-dashed"></div>

                <div class="text-right">
                    <button class="btn btn-gradient-01" type="submit">Ответить</button>
                    <button class="btn btn-shadow" type="reset">Закрыть</button>
                </div>
            </form>
        </div>
    </div>
@endsection
