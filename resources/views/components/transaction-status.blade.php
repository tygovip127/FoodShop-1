@if($status === 0)
<span class="badge bg-warning rounded-pill">waiting</span>
@elseif($status === 1)
<span class="badge bg-info rounded-pill">approved</span>
@elseif($status === 2)
<span class="badge bg-success rounded-pill">done</span>
@endif