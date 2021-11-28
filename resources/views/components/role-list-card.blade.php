<tr class="text-center pb-10">
    <td class="ps-4">
        <p class="text-xs font-weight-bold mb-0">{{ $id }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold mb-0">{{ $name }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $displayName }}</p>
    </td>
    <td class="text-center">
        <a href="{{ route('admin.roles.edit', array($id)) }}" class="mx-3">
            <i class="fas fa-user-edit text-secondary"></i>
        </a>
        <a href="" data-url="{{ route('admin.roles.destroy', array($id)) }}" class="action_delete">
            <i class="cursor-pointer fas fa-trash text-secondary"></i>
        </a>
    </td>
</tr>