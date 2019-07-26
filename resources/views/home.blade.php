@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @foreach($questions as $question)
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$question->topic}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                        <form id="contactform" name="contact" method="post" action="{{route('home')}}">--}}
                            <form id="contactform" name="contact" method="post" action="{{ url('/home/'.$question->id) }}">
                            @csrf
                            <p>{{$question->question}}</p>
                            <label for="" class="col col-form-label text-md-left">Комментарий</label>
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" name="comment" rows="2"></textarea>
                            <br>
                            <div class="col-md-12  text-center">
                                @if ($hide=='1')
                                    <p>Вы проголосовали</p>
                                @else
                                    <button type="submit" name="btn-good" class="btn btn-primary">
                                        {{ __('Согласен') }}
                                    </button>
                                    <button type="submit" name="btn-bad" class="btn btn-primary">
                                        {{ __('Не согласен') }}
                                    </button>
                                @endif
                             </div>
                                <div class="voting">

                                ПГА
                                    @if ($question->answer1 == '1')
                                        <span class="text-success">(За)</span><i>{{$question->answer_date1}}</i>
                                    @elseif ($question->answer1 == '0')
                                        <span class="text-danger">(Против)</span><i>{{$question->answer_date1}}</i>
                                    @else
                                        <span class="text-primary">(Не голосовал)</span>
                                    @endif
                                    <br>
                                    {{$question->comment1}}
                                    <hr>
                                АВВ
                                    @if ($question->answer2 == '1')
                                        <span class="text-success">(За)</span><i>{{$question->answer_date2}}</i>
                                    @elseif ($question->answer2 == '0')
                                        <span class="text-danger">(Против)</span><i>{{$question->answer_date2}}</i>
                                    @else
                                        <span class="text-primary">(Не голосовал)</span>
                                    @endif
                                    <br>
                                    {{$question->comment2}}
                                    <hr>

                                СВВ
                                    @if ($question->answer3 == '1')
                                        <span class="text-success">(За)</span><i>{{$question->answer_date2}}</i>
                                    @elseif ($question->answer3 == '0')
                                        <span class="text-danger">(Против)</span><i>{{$question->answer_date2}}</i>
                                    @else
                                        <span class="text-primary">(Не голосовал)</span>
                                    @endif
                                    <br>
                                    {{$question->comment3}}
                                    <hr>
                                </div>
                        </form>
                </div>
            </div>
            <br>
        </div>
           @endforeach

    </div>
</div>
@endsection
