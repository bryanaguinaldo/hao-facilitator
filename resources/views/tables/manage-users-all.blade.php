@foreach($users as $user)
<tr>
    <td class="ps-4">
        <p class="text-xs font-weight-bold mb-0">{{ $user->id }}</p>
    </td>
    <td>
        <div>
            <img src="../assets/img/blank.png" class="avatar avatar-sm me-3">
            <span class="text-xs font-weight-bold mb-0">{{ $user->name }}</span>
        </div>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $user->roles->role_name }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $user->firstname }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $user->lastname }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ $user->user->email }}</p>
    </td>
    <td class="text-center">
        <p class="text-xs font-weight-bold mb-0">{{ Str::limit($user->facilities->facility_name, $limit = 40, '...') }}</p>
    </td>
    <td class="text-center">
        <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at->format('F d, Y H:i:s') }}</span>
    </td>
    <td class="text-center">
        @if($user->trashed())
        <p class="text-xs font-weight-bold mb-0 text-danger">Deleted</p>
        @else
        <p class="text-xs font-weight-bold mb-0 text-success">Active</p>
        @endif
    </td>
    <td class="text-center">
        <a href="javacsript:;" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
            <i class="fas fa-user-edit text-primary text-gradient= h5"></i>
        </a>
        @if($user->trashed())
        <i class="cursor-pointer fas fa-trash-restore text-success text-gradient h5" id="restore" data-id="{{ $user->id }}"></i>
        @else
        <i class="cursor-pointer fas fa-trash text-danger text-gradient h5" id="delete" data-id="{{ $user->id }}"></i>
        @endif
    </td>
</tr>
@endforeach
