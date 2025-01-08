@foreach (['success', 'error', 'warning'] as $msg)
  @if ($message = Session::get($msg))
      <div class="alert alert-{{ $msg == 'error' ? 'danger' : $msg }} alert" role="alert">
          <strong>{{ $message }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
@endforeach

