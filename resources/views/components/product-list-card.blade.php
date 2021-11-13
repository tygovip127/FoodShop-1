<tr class="text-center pb-10">
    <td class="ps-4">
        <p class="text-xs font-weight-bold mb-0">{{ $id }}</p>
    </td>
    <td>
        <div>
            <img src="{{ $image }}" class="pt-2" style="width:5rem;">
        </div>
    </td>
    <td>
        <p class="text-xs font-weight-bold  d-inline-block text-truncate">{{ $title }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $categoryId }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $restockValue }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $sellValue }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $rate }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $view }}</p>
    </td>
    <td>
        <span class="text-secondary text-xs font-weight-bold">{{ $createdAt }}</span>
    </td>
    <td>
        <span class="text-secondary text-xs font-weight-bold">{{ $updatedAt }}</span>
    </td>
    <td>
        <a href="" class="mx-3">
            <i class="fas fa-user-edit text-secondary"></i>
        </a>
        <a href="" data-url="{{ route('admin.products.destroy', array($id)) }}" class="action_delete">
            <i class="cursor-pointer fas fa-trash text-secondary"></i>
        </a>
    </td>
</tr>