@extends('layouts.app')

@section('content')
    <select name="province" id="province">
      <option value="1">Hihi</option>
      <option value="2">aab</option>
    </select>
    {{-- <script>
      $(document).ready(function (){
        $('#province').change(function(e){
          alert('Please select');
        })
      })
    </script> --}}
@endsection
@section('script')
    
<script>
  $(document).ready(function (){
    $('#province').change(function(e){
      alert('Please select');
    })
  })
</script>
@endsection