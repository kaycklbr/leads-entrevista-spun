@extends('layouts.app')

@section('content')
<div class="content">
    <div class="d-flex gap-2 align-items-center">
        <h3 class="title ">Quizzes</h3>
        <a href="{{route('quiz.create')}}" class="btn btn-primary circle-btn"><i width="20" height="20" data-feather="plus"></i></a>
    </div>


    <section class="quizzes">
        @foreach($quizzes as $q)
        @include('components.quiz-card', ['quiz' => $q])
        @endforeach
    </section>
</div>
@endsection
