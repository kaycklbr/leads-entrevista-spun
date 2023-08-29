@extends('guest.layouts.app')
@section('content')

<div class="container container-visitant">
  <div class="quiz-content">
    <h3 class="title mt-5 mb-4 text-center">{{$quiz->name}}</h3>
  
    <div class="progress-container">
      <div class="progress">
        <div class="progress-done" data-done="60">
        </div>
      </div>
      <div class="step">
        1/5
      </div>
    </div>
  
    <section class="quiz-question mt-5">
      @foreach($quiz->questions as $question)
      <div class="question">

        <h4 class="primary-color"><b>{{$question->text}}</b></h4>
    
        <div class="options">
          <div class="input-container">
            <input id="walk" class="radio-button" type="radio" name="radio" />
            <div class="radio-tile">
              <div class="letter">A</div>
              <label for="walk" class="radio-tile-label">{{'TESTE'}}</label>
            </div>
          </div>
        </div>

      </div>
      @endforeach
    </section>
  </div>
  <div class="continue">
    <button class="btn btn-success btn-lg next">Continuar</button>
  </div>
</div>


@endsection

@section('scripts')
<script>
  const progress = document.querySelector('.progress-done');

  setTimeout(() => {
    progress.style.opacity = 1;
    progress.style.width = progress.getAttribute('data-done') + '%';
  }, 500)


  document.querySelector('.next').addEventListener('click', () => {
    toast({
      title: "Selecione uma opção!",
      type: "info",
      duration: 50000
    });
  });

</script>
@endsection