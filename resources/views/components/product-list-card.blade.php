<tr class="text-center pb-10">
    <td class="ps-4">
        <p class="text-xs font-weight-bold mb-0">{{ $id }}</p>
    </td>
    <td>
        <div>
            <img src="{{ $image }}" class="avatar avatar-sm me-3">
        </div>
    </td>
    <td class="">
        <p class="text-xs font-weight-bold mb-0">{{ $title }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $sellValue }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $rate }}</p>
    </td>
    <td class="text-center">
        @can('edit_product')
        <a href="{{ route('admin.products.edit', array($id)) }}" class="mx-3">
            <i class="fas fa-user-edit text-secondary"></i>
        </a>
        @endcan
        @can('delete_product')
        <a href="" data-url="{{ route('admin.products.destroy', array($id)) }}" class="action_delete">
            <i class="cursor-pointer fas fa-trash text-secondary"></i>
        </a>
        @endcan
    </td>
</tr>