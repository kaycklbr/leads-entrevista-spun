<div class="quiz-card">
  <h5 class="quiz-title"><span>#</span>{{$quiz->name}} <a href="{{ url($quiz->slug) }}" target="_blank" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ir para quiz"><i width="20" height="20" data-feather="link"></i></a><h5>
  <div class="quiz-content">
    <p>Questões: {{$quiz->questions()->count()}}</p>
    <p>Leads capturados: {{$quiz->leads()->count()}}</p>
  </div>
  <div class="quiz-options mt-3 text-end">
    <a href="{{route('quiz.show', ['id' => $quiz->id])}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver detalhes"><i width="20" height="20" data-feather="eye"></i></a>

    <form method="post" class="d-inline-block" action="{{route('quiz.delete', ['id' => $quiz->id])}}">
      @csrf
      <button class="btn btn-danger d-inline-block btn-sm" onclick="return confirmDelete()" data-bs-toggle="tooltip" data-bs-placement="top" title="Remover quiz"><i width="20" height="20" data-feather="trash"></i></button>
    </form>
  </div>
</div>