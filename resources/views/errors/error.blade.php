
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><p class="text-center">{{ $message }}</p></strong>
    </div>
@endif
