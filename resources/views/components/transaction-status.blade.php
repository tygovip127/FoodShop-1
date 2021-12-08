@if($status === 0)
<span class="badge bg-warning rounded-pill">pending</span>
@elseif($status === 1)
<span class="badge bg-info rounded-pill">approved</span>
@elseif($status === 2)
<span class="badge bg-success rounded-pill">delivered</span>
@endif