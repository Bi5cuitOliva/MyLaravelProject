<x-app-layout>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <div class="alert alert-success">{{session('status')}}</div>

                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Responsibility : {{$role->name}}
                            <a href="{{ url('roles') }}" class="btn btn-danger float-end">
                                Back
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                       @csrf
                       @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                           <span class="text danger">{{$message}}</span>
                            @enderror
                            <label for="">Entitlements</label>
                            <div class="row">
                                @foreach ($permissions as $permission )
                              <div class="col-md-2">
                                <label for="">
                            <input type="checkbox" name="permission[]" value="{{$permission->name}}"
                               {{in_array($permission->id, $rolePermissions) ? 'checked':''}}
                            />
                            {{$permission->name}}
                                </label>
                        </div>
                        @endforeach
                    </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
