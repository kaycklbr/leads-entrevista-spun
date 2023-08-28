<footer class="footer-auth container">
  <ul>
      <li><a href="{{ route('terms') }}" class="{{\Route::is('*termos*') ? 'active' : ''}}">Termos de uso</a></li>
      <li><a href="{{ route('privacy') }}" class="{{\Route::is('*privacidade*') ? 'active' : ''}}">Política de privacidade</a></li>
  </ul>
</footer>