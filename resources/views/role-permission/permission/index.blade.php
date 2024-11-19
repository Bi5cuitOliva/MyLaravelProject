<x-app-layout>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                   <div class="alert alert-success">{{ session('status') }}</div>

                @else

                @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Permissions
                            <a href="{{url('permissions/create')}}" class="btn btn-primary float-end">
                                Add Permission
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
                                <tr>
                                  <td>

                                  </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
