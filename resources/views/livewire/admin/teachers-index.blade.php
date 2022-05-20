<div>
    @if (session('info'))
        <div class="alert alert-success ">
            {{ session('info') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td width="30px">
                                <x-adminlte-button label="Asignar escuela" data-toggle="modal"
                                    data-target="#modalCustom{{$item->id}}" class="bg-teal" />
                            </td>
                        </tr>
                        <div>
                            @livewire('admin.teacher-school', ['user' => $item], key($item->id))
                        </div>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    



</div>
