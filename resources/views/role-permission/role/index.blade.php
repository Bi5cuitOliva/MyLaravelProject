<x-app-layout>

@include('role-permission.nav-links')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                   <div class="alert alert-success">{{ session('status') }}</div>

                @else

                @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Responsibility
                            <a href="{{url('roles/create')}}" class="btn btn-primary float-end">
                                Add Responsibility
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role )

                                <tr>
                                  <td>
                                 {{$role->id}}
                                  </td>
                                  <td>
                                    {{$role->name}}
                                     </td>
                                     <td>
                                        <a href="{{url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-success">Add/Edit Responsibility Entitlement</a>
                                     <a href="{{url('roles/'.$role->id.'/edit') }}" class="btn btn-success">Edit</a>
                                     <a href="{{url('roles/'.$role->id.'/delete') }}" class="btn btn-danger mx-2">Delete</a>
                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
