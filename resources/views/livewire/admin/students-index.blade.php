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
                    @foreach ($students as $item)
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
                                <x-adminlte-button data-item="{{$item}}" label="Asignar escuela" data-toggle="modal"
                                    data-target="#modalCustom" class="bg-teal Carga" />
                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    
    <x-adminlte-modal id="modalCustom" title="Asignar escuela" size="md" theme="teal"
    icon="fas fa-bell" v-centered scrollable>
    <div>
        <form id="frmUpdStudent" method="post">
        {{ csrf_field() }}
        <div class="flex items-center">
        <p class="w-32">Alumno: <label class="stu_name"></label> </p>
        </div>
        <input type="hidden" class="user_id" name="user_id">
        <div class="flex items-center mt-4">
            <label class="w-32">Escuela: </label>
            <x-adminlte-select2 name="school_id" class="escuela_student">
                <option value="">Selecciona una escuela...</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </x-adminlte-select2>
            
        </div>
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Acceptar" onclick="saveSchool('frmUpdStudent')" />
            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
        </x-slot>
    </form>
</x-adminlte-modal>

@push('js')
<script>
    $(document).on("click", ".Carga", function () {
        var ruta = '{{ route('admin.student.setSchool',':student') }}';  
        var Item = $(this).data('item');
        ruta = ruta.replace(':student', Item.id);
        $('.stu_name').html(Item.name);
        $('.user_id').val(Item.id);
        $('#frmUpdStudent').attr('action', ruta);
    });

    function saveSchool(form) {
        $("#" + form).submit();
        
    }


    
</script>
    
@endpush


</div>
