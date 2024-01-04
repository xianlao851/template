<div>
    <div class="h-screen max-w-6xl p-1 mx-auto mt-4 bg-white rounded-md">
        <div class="relative h-10 border-b-2">
            <div class="absolute left-0 top-3">
                <h3 class="mx-1">Admin Dashboard</h3>
            </div>
            <div class="absolute top-0 right-0"> <label class="bg-gray-300 btn btn-sm hover:bg-gray-400" for="addUser"> <i
                        class="las la-plus-circle la-2x"></i></label></div>
        </div>
        <div class="">
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($users as $user)
                                <td class="uppercase">{{ $user->name }}</td>
                                <td class="uppercase">Empty</td>
                                <td class="uppercase">Empty</td>
                            @empty
                            @endforelse

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal-->

        <input type="checkbox" id="addUser" class="modal-toggle" /> <!-- Add user-->
        <div class="modal" role="dialog">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Add User</h3>
                <div class="w-full mt-2">
                    <div class="w-full join">
                        <input class="w-96 input input-bordered join-item" placeholder="Search..."
                            wire:model.lazy='search_employee' />
                        <button class="rounded-r-full btn join-item">Search</button>
                    </div>
                </div>
                <div class="h-60">
                    <ul>
                        @if ($employees)
                            @forelse ($employees as $employee)
                                <li class="p-1 mt-2 rounded-md cursor-pointer bg-stone-300 hover:bg-stone-400"
                                    wire:click='selectedEmployee({{ $employee->emp_id }})'>
                                    {{ $employee->lastname }},
                                    {{ $employee->firstname }}
                                </li>
                            @empty
                            @endforelse
                        @endif
                    </ul>
                </div>
                <div class="mt-2">
                    @if ($employees != null)
                        {{ $employees->links() }}
                    @endif
                </div>

                <div class="modal-action">
                    <label for="addUser" class="btn btn-sm">Close!</label>
                </div>
            </div>
        </div><!-- Add user end-->

        <!--selected user-->
        <input type="checkbox" id="selectedEmployee" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Hello!</h3>
                <p class="py-4">This modal works with a hidden checkbox!</p>
                <div class="modal-action">
                    <label for="selectedEmployee" class="btn">Close!</label>
                </div>
            </div>
        </div>
        <!--selected user end-->

        <!----->
    </div>
</div>
