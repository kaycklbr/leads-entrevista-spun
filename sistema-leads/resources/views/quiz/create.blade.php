@extends('layouts.app')

@section('content')
<div class="content">
    <div class="d-flex gap-2 align-items-center">
        <h3 class="title ">Quizzes > <span class="primary-color">Criar novo quiz</span></h3>
    </div>

    <form method="post">
        @csrf
        <div class="quiz-card my-3 py-3 pb-3">

            <div class="form-group">
                <label for="name"><h5>Nome</h5></label>
                <input required type="text" class="form-control" id="name" name="name" placeholder="Nome do quiz">
            </div>

            <hr style="color: #d2d7db">
            
            <h5>Questões</h5>

            <div class="questions">
                <div class="question">
                    <div class="form-group">
                        <label for="question"><h6>Texto da questão</h6></label>
                        <input type="hidden" class="q-id" name="question_id[]" value="1">
                        <textarea required class="form-control q-name" id="question_1" name="question_1" placeholder="Questão"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="question"><h6>Alternativa correta</h6></label>
                        <select required class="form-control q-answer" name="alternative_checked_1" placeholder="Selecione qual a alternativa correta">
                            <option value="">Selecione...</option>
                            <option value="a">Letra A</option>
                        </select>
                    </div>
                    <h6 class="mt-3">Alternativas</h6>
                    <div class="alternatives w-100">
                        <div class="alternative form-group">
                            <span class="op">a</span>
                            <input required type="text" class="form-control q-op" id="alternative_1" name="alternative_1_a" placeholder="Alternativa">
                            <button type="button" class="btn btn-danger remove-alternative" onclick="removeAlternative(this)"><i data-feather="trash"></i></button>
                        </div>
                    </div>
                    <div class="">
                        <button type="button" class="mt-2 btn btn-primary" onclick="addAlternative(this)">Adicionar alternativa</button>
                        <button type="button" class="mt-2 btn btn-danger" onclick="removeQuestion(this)">Remover questão</button>
                    </div>
                </div>
                
            </div>
            
            <button type="button" class="btn btn-primary" onclick="addQuestion(this)">Adicionar questão</button>
            
            <hr style="color: #d2d7db">
            
            <div class="text-end">
                <button type="submit" class="btn btn-success">Publicar Quiz</button>
            </div>

        </div>
    </form>
</div>

@endsection

@section('scripts')

<script>

    const questionTemplate = document.querySelector('.questions .question').cloneNode(true);
    const alternativeTemplate = document.querySelector('.questions .question .alternative').cloneNode(true);
    const removeAlternativeTemplate = document.querySelector('.questions .question .alternative .remove-alternative').cloneNode(true);
    document.querySelector('.questions .question .alternative .remove-alternative').remove();

    function addQuestion(el) {
        const cloneQuestion = questionTemplate.cloneNode(true);
        const randomId = generateRandomId();
        cloneQuestion.querySelector('.q-id').value = randomId;
        cloneQuestion.querySelector('.q-name').id = 'question_' + randomId;
        cloneQuestion.querySelector('.q-name').name = 'question_' + randomId;
        cloneQuestion.querySelector('input.q-op').id = 'alternative_' + randomId + '_a';
        cloneQuestion.querySelector('input.q-op').name = 'alternative_' + randomId + '_a';
        cloneQuestion.querySelector('.q-answer').name = 'alternative_checked_' + randomId;
        document.querySelector('.questions').append(cloneQuestion);
    }

    function addAlternative(el) {
        const letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
        const questionElement = el.closest('.question');

        const cloneAlternative = alternativeTemplate.cloneNode(true);
        const alternatives = questionElement.querySelectorAll('.alternatives .alternative');
        if(alternatives.length >= 10){
            return;
        }
        for(let e of alternatives){
            if(e.querySelector('.remove-alternative')){
                e.querySelector('.remove-alternative').remove();
            }
        }
        let newOption = new Option('Letra ' + letters[alternatives.length].toUpperCase(),letters[alternatives.length]);
        questionElement.querySelector('select').add(newOption);
        cloneAlternative.querySelector('.op').textContent = letters[alternatives.length];
        const randomId = questionElement.querySelector('.q-id').value;
        cloneAlternative.querySelector('input.q-op').name = 'alternative_' + randomId + '_' + letters[alternatives.length];
        questionElement.querySelector('.alternatives').append(cloneAlternative);
    }

    function removeQuestion(el){
        const questionElement = el.closest('.question');
        questionElement.remove();
    }

    function removeAlternative(el){
        const alternativeElement = el.closest('.alternative');
        const alternatives = el.closest('.alternatives').querySelectorAll('.alternative');
        el.closest('.question').querySelector('select').remove(alternatives.length);
        alternativeElement.remove();
        if(alternatives.length && alternatives.length > 2){
            alternatives[alternatives.length - 2].append(removeAlternativeTemplate);
        }
    }

    function generateRandomId () {
        return Math.random().toString(36).slice(2);
    }

</script>

@endsection
