@extends('layouts.app')

@section('content')
<form action="#" method="post">
  @csrf
  @method('put')
  <div class="col-auto profile-btn">
    <input type="file" name="image" id="upload" hidden />
    <label class="btn-primary p-2" for="upload">Edit avatar</label>
  </div>
  <div class="single-input-item">
    <button class="check-btn sqr-btn ">Save Changes</button>
  </div>
</form>
@endsection
@section('script')
<script>
  
</script>
@endsection