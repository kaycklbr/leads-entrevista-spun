<nav class="navbar-auth container px-3">
  <h3>Leads <span class="primary">Marketing</span></h3>
  <ul class="p-0">
      <li><a href="{{ route('login') }}" class="{{\Route::is('*login*') ? 'active' : ''}}">Entrar</a></li>
      <li><a href="{{ route('register') }}" class="{{\Route::is('*register*') ? 'active' : ''}}">Cadastrar</a></li>
  </ul>
</nav>