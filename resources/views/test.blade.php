@extends('layouts.app')

@section('content')
<div class="shop-bottom-area">
  <div class="tab-content jump">
    <div id="shop-1" class="tab-pane active">
      <div class="row">
        {{ dd($products) }}
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection