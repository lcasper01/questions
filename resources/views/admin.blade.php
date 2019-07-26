@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание вопроса</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form id="contactform" name="contact" method="post" action="{{route('CreateQuestion')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col col-form-label text-md-left">{{ __('Тема') }}</label>
                                    <input id="name" type="text" class="form-control" name="topic" value="" required autofocus>
                                    <label for="" class="col col-form-label text-md-left">{{ __('Вопрос') }}</label>
                                    <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" name="question" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Создать') }}
                                </button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
