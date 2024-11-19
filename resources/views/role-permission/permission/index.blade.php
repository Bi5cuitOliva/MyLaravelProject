<x-app-layout>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                   <div class="alert alert-success">{{ session('status') }}</div>

                @else

                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Permissions
                            <a href="{{url('permissions')}}" class="btn btn-primary float-end">
                                Add Permission
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
