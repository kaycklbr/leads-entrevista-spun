@extends('guest.layouts.app')
@section('content')

<form method="post">
  @csrf
<div class="container container-visitant">
  <div class="quiz-content">
    <h3 class="title mt-5 mb-4 text-center">{{$quiz->name}}</h3>
  
    <div class="progress-container">
      <div class="progress">
        <div class="progress-done" data-done="0">
        </div>
      </div>
      <div class="step">
        <span id="current-question">1</span>/<span class="total-questions">{{count($quiz->questions)}}</span>
      </div>
    </div>

    <ul class="nav nav-tabs d-none" id="questionTab" role="tablist">
      @foreach($quiz->questions as $i => $question)
      <li class="nav-item" role="presentation">
        <button class="nav-link {{$i == 0 ? 'active' : ''}}" id="tabquestion_{{$question->id}}-tab" data-bs-toggle="tab" data-bs-target="#tabquestion_{{$question->id}}" type="button" role="tab" aria-controls="tabquestion_{{$question->id}}" aria-selected="true">Tab {{$question->id}}</button>
      </li>
      @endforeach
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tabquestion_finish-tab" data-bs-toggle="tab" data-bs-target="#tabquestion_finish" type="button" role="tab" aria-controls="tabquestion_finish" aria-selected="true">Tab End</button>
      </li>
    </ul>
  
    <section class="quiz-question mt-5 tab-content" id="questionTabContent">
      @foreach($quiz->questions as $i => $question)
      @php
          $alternatives = json_decode($question->alternatives);
      @endphp
      <div class="tab-pane fade question {{$i == 0 ? 'show active' : ''}}" data-index="{{$i}}" data-id="{{$question->id}}" id="tabquestion_{{$question->id}}" aria-labelledby="tabquestion_{{$question->id}}-tab" role="tabpanel">

        <h4 class="primary-color"><b><span class="text-black">#{{$i + 1}}</span> {{$question->text}}</b></h4>
    
        <div class="options">
          @foreach($alternatives as $k => $v)
          <div class="input-container">
            <input id="op_{{$k}}" class="radio-button" type="radio" value="{{$k}}" name="question_{{$question->id}}" />
            <div class="radio-tile">
              <div class="letter">{{strtoupper($k)}}</div>
              <label for="{{$k}}" class="radio-tile-label">{{$v}}</label>
            </div>
          </div>
          @endforeach
        </div>

      </div>
      @endforeach
      <div class="tab-pane fade question " data-index="{{count($quiz->questions)}}" id="tabquestion_finish" aria-labelledby="tabquestion_finish-tab" role="tabpanel">

        <h4 class="primary-color"><b>Estamos quase lá!</b></h4>
        <h6>Insira seus dados abaixo para ver nossa recomendação.</h6>

        <div class="form-group text-start mt-5">
          <label>Digite seu nome</label>
          <input required type="text" name="name" class="form-control bg-white" placeholder="Insira seu nome"/>
        </div>
        <div class="form-group text-start mt-3">
          <label>Digite seu e-mail</label>
          <input required type="email" name="email" class="form-control bg-white" placeholder="Insira seu melhor e-mail"/>
        </div>

        <div class="text-center">
          <img src="{{ asset('img/finish.svg') }}" style="max-width: 400px"/>
        </div>
        
        
        
        <div class="text-center">
          <div class="form-group d-inline">
            <input  class="d-inline" type="checkbox" id="terms" name="terms" required />
            <label style="font-weight: 400" class="d-inline" for="terms">Li e concordo com os <a href="{{route('terms')}}">termos de serviço</a> e aceito receber comunicações da Leads Marketing, que poderão ser canceladas a qualquer momento.</label>
          </div>
        </div>

        

      </div>
    </section>
  </div>
  <div class="continue">
    <button type="button" class="btn btn-success btn-lg next">Continuar</button>
  </div>
</div>
</form>


@endsection

@section('scripts')
<script>

  const totalQuestions = {{count($quiz->questions)}};
  // let currentQuestion = 1;
  const currentQuestionEl = document.querySelector('#current-question');

  const progress = document.querySelector('.progress-done');

  setTimeout(() => {
    progress.style.opacity = 1;
    progress.style.width = progress.getAttribute('data-done') + '%';
  }, 500)

  function changeProgressPercent (percent) {
    progress.style.width = percent + '%';
  }


  document.querySelector('.next').addEventListener('click', (el) => {

    if(el.currentTarget.innerText == 'Concluir'){
      document.querySelector('form').submit();
      return;
    }

    const currentTabActive = document.querySelector('.tab-pane.question.active');
    const isSelected = Array.from(currentTabActive.querySelectorAll('input[type=radio]')).some(e => e.checked);
    const nextTab = currentTabActive.nextElementSibling;
    const currentQuestion = parseInt(nextTab.dataset.index) + 1;
    
    if(!isSelected || currentQuestionEl <= totalQuestions){
      toast({
        title: "Selecione uma opção!",
        type: "info",
        duration: 3000
      });
    }else{
      currentQuestionEl.innerHTML = currentQuestion > totalQuestions ? totalQuestions : currentQuestion;
      const bt = document.querySelector('#questionTab li button#'+nextTab.id+'-tab');
      bt.click();
      bt.dispatchEvent(new Event('click'));
      const totalPercent = (currentQuestion - 1) / (totalQuestions + 1) * 100;
      changeProgressPercent(totalPercent);
      if(currentQuestion > totalQuestions){
        el.currentTarget.innerText = 'Concluir'
      }
    }
  });

</script>
@endsection