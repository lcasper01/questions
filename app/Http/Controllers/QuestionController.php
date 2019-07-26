<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
   public function Create(Request $request){
       $question=new Question();
       $data=$request->input();
       $question->question=$data['question'];
       $question->topic=$data['topic'];
       $question->save();
    return view('welcome');
   }

   public function PageCreate(){
       return view('admin');
   }

   public function ShowQuetions(Request $request, $id){

       //Если отправили данные с формы то записываем в БД
       if ($request->isMethod('post')) {
       //POST
           $data=$request->input();
           $question=Question::where('id',$id)->first();

        //Кнопки согласен и Не согласек
           if (isset($_POST['btn-good'])) {
               $answ=1;
           } else if (isset($_POST['btn-bad'])) {
               $answ=0;
           } else {
               echo "Поле name в кнопке неверно";
           };

           $user = Auth::user()->name;
           switch ($user){
               case "ПГА":
                   $question->comment1=$data['comment'];
                   $question->answer1=$answ;
                   break;
               case "АВВ":
                   $question->comment2=$data['comment'];
                   $question->answer2=$answ;
                   break;
               case "СВВ":
                   $question->comment3=$data['comment'];
                   $question->answer3=$answ;
                   break;
           }
           $hide=1;
           $question->save();
       }


       $questions=Question::where('closed',0)->get();
       return view('home',compact('questions', 'hide'));
   }
   public function archiveQuestion(){
       $closed_questions=Question::where('closed',1)->get();
       return view('archiveQuestion',compact('closed_questions'));
   }

}
