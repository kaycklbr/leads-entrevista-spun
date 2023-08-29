<div class="quiz-card">
  <h5 class="quiz-title"><span>#</span>{{$quiz->name}}<h5>
  <div class="quiz-content">
    <p>Questões: {{$quiz->questions()->count()}}</p>
    <p>Leads obtidos: {{$quiz->leads()->count()}}</p>
  </div>
  <div class="quiz-options mt-3 text-end">
    <a href="" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver detalhes"><i width="20" height="20" data-feather="eye"></i></a>
    <a href="" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Concluir quiz"><i width="20" height="20" data-feather="check"></i></a>
    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Remover quiz"><i width="20" height="20" data-feather="trash"></i></a>
  </div>
</div>