<tr>
    <td class="ps-4">
        <p class="text-xs font-weight-bold mb-0">{{ $id }}</p>
    </td>
    <td>
        <div>
            <img src="{{ $image }}" class="avatar avatar-sm me-3">
        </div>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $title }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $categoryId }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $restockValue }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $sellValue }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $rate }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $view }}</p>
    </td>
    <td class="text-center">
        <span class="text-secondary text-xs font-weight-bold">{{ $createdAt }}</span>
    </td>
    <td class="text-center">
        <span class="text-secondary text-xs font-weight-bold">{{ $updatedAt }}</span>
    </td>
    <td class="text-center">
        <a href="" class="mx-3">
            <i class="fas fa-user-edit text-secondary"></i>
        </a>
        <a href="" data-url="{{ route('admin.products.destroy', array($id)) }}" class="action_delete">
            <i class="cursor-pointer fas fa-trash text-secondary"></i>
        </a>
    </td>
</tr>