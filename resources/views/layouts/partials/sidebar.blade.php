<aside class="sidebar">
  <h3 class="title text-center my-3">Leads<br><span class="primary-color">Marketing</span></h3>

  <div class="text-center">
    <span class="mb-0 px-2">Olá,
      <span style="font-weight: 800">{{auth()->user()->name}}</span>
    </span>
  </div>

  <nav class="mt-5">
    <ul>
      <li><a href="{{route('home')}}" class="{{Route::is('*home*') ? 'active' : ''}}">Quizzes</a></li>
      <li><a href="{{route('leads')}}">Leads</a></li>
    </ul>
  </nav>

</aside>