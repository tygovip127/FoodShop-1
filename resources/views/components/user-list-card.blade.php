<tr class="text-center pb-10">
    <td class="ps-4">
        <p class="text-xs font-weight-bold mb-0">{{ $id }}</p>
    </td>
    <td>
        <div>
            <img src="{{ $avatar }}" class="avatar avatar-sm me-3">
        </div>
    </td>
    <td class="">
        <p class="text-xs font-weight-bold mb-0">{{ $fullname }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $email }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $phone }}</p>
    </td>
    <td>
        <p class="text-xs font-weight-bold ">{{ $address }}</p>
    </td>
    <td class="text-center">
        <a href="{{ route('admin.users.edit', array($id)) }}" class="mx-3">
            <i class="fas fa-user-edit text-secondary"></i>
        </a>
        <a href="" data-url="{{ route('admin.users.destroy', array($id)) }}" class="action_delete">
            <i class="cursor-pointer fas fa-trash text-secondary"></i>
        </a>
    </td>
</tr>