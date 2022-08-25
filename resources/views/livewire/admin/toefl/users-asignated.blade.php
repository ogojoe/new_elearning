<div>
    <div class="card">
        <div class="card-header form-row">
            <div class="col-md-10 mb-3">
                <input wire:key-down="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escribe tu busqueda" type="text">
            </div>
            <div class="col-md-2 mb-3">
                <button type="button" class="btn btn-primary elmodal" data-toefl="{{$toefl}}" label="Asignar escuela" data-toggle="modal"
                data-target="#modalCustom">Nuevo evaluado</button>
            </div>
          </div>

        @if ($asignateds->count())
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
                        @foreach ($asignateds as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td width="10px">
                                        {{-- <a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Editar</a> --}}
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$asignateds->links()}}
            </div>

            @else
            <div class="card-body">
                <strong>No hay registros para mostrar</strong>
            </div>

        @endif        
    </div>


    <x-adminlte-modal id="modalCustom" title="Asignar Evaluado" size="md" theme="teal"
        icon="fas fa-bell" v-centered scrollable>
        <div>
            <form id="frmAsgin" method="post">
            {{ csrf_field() }}
            <input type="hidden" class="toefl_id" name="toefl_id">
            <div class="flex items-center mt-4">
                <label class="w-32">Usuario: </label>
                <x-adminlte-select2 name="user_id">
                    <option value="">Selecciona el usuario a asignar</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </x-adminlte-select2>
                
            </div>
            </div>
            <x-slot name="footerSlot">
                <x-adminlte-button class="mr-auto" theme="success" label="Aceptar" onclick="save('frmAsgin')" />
                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
            </x-slot>
        </form>
    </x-adminlte-modal>

    @push('js')
    <script>
        $(document).on("click", ".elmodal", function () {
            var ruta = '{{ route('admin.toefls.asignar') }}';  
            var Item = $(this).data('toefl');
            ruta = ruta.replace(':toefl', Item.id);
            $('.toefl_id').val(Item.id);
            $('#frmAsgin').attr('action', ruta);
        });

        function save(form) {
            $("#" + form).submit();
            
        }


        
    </script>
        
    @endpush


</div>
