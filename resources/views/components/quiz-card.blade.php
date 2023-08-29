<div class="quiz-card">
  <h5 class="quiz-title"><span>#</span>{{$quiz->name}} <a href="{{ url($quiz->slug) }}" target="_blank" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ir para quiz"><i width="20" height="20" data-feather="link"></i></a><h5>
  <div class="quiz-content">
    <p>Questões: {{$quiz->questions()->count()}}</p>
    <p>Leads capturados: {{$quiz->leads()->count()}}</p>
  </div>
  <div class="quiz-options mt-3 text-end">
    <a href="" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver detalhes"><i width="20" height="20" data-feather="eye"></i></a>
    <a href="" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Concluir quiz"><i width="20" height="20" data-feather="check"></i></a>
    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Remover quiz"><i width="20" height="20" data-feather="trash"></i></a>
  </div>
</div>