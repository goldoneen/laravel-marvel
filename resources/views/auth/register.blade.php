<form method="POST" action="{{ route('register') }}">
  @csrf
  <!- Registration form fields ->
  <button type="submit">Register</button>
</form>