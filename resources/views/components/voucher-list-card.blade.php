<tr class="text-center pb-10">
    <td class="ps-4">
        <p class="text-left text-xs font-weight-bold mb-0">{{ $name }}</p>
    </td>
    <td class="">
        <p class="text-xs font-weight-bold mb-0">{{ $discount }}%</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $amount }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $startedTime }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $expiredTime }}</p>
    </td>
    <td class="text-center">
        <a href="" data-url="{{ route('admin.vouchers.destroy', array($name)) }}" class="action_delete">
            <i class="cursor-pointer fas fa-trash text-secondary"></i>
        </a>
    </td>
</tr>