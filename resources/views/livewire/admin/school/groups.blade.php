<div class="col-md-4">
    <div class="card card-widget widget-user-2">
        <div class="widget-user-header bg-gradient-lightblue">
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="https://picsum.photos/id/1/100" alt="User avatar: {{ $group->name }}">
            </div>
            <a href="{{ route('admin.school.group.edit', ['school' => $school, 'group' => $group]) }}" class="btn btn-default btn-xs float-right" title="Editar" ><i class="fa fa-pencil-alt" ></i></a>
            <h3 class="widget-user-username mb-0">{{ $group->name }}</h3>
            
            <h6 class="widget-user-desc">
                <div class="color-palette-set">
                    <div class="bg-gray disabled color-palette">
                        <span>Teacher:
                        @if ($group->teacher_id)
                            {{$group->maestro->name}} 
                        <button role="button" class="elmodal" data-toefl="{{$group}}" title="Click para editar" data-toggle="modal"data-target="#modalCustom">Editar docente</button>
                        @else
                        <button role="button" class="elmodal" data-toefl="{{$group}}" title="Click para asignar" data-toggle="modal"data-target="#modalCustom">Asignar docente</button>
                        @endif  
                        </span>
                    </div>
                </div>
            </h6>

            <h6 class="widget-user-desc" >
                <div class="color-palette-set">
                    <div class="bg-gray disabled color-palette">
                        <span>Curso:
                        @if ($group->course)
                        {{ Str::limit($group->course->title,25)}} 
                        <button role="button" title="Da click para modificar!" data-toggle="modal" data-target="#modal-course{{$group->id}}">
                            Modificar curso
                        </button>
                        @else
                        <button role="button" title="Da click para asignar!" data-toggle="modal" data-target="#modal-course{{$group->id}}">
                            Asignar curso
                        </button>
                        @endif 
                        </span>
                    </div>
                </div>
            </h6>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="p-0 col-12">
                    <span class="nav-link">
                        <i class="fas fa-fw fa-user-friends"></i>
                        <a href="{{route('admin.school.group.alumnos.index',['school' => $school, 'group' => $group])}}">Alumnos</a>
                        <span class="float-right badge bg-teal">
                            {{$group->studentsGroup->count()}}
                        </span>
                    </span>
                </div>
                <div class="p-0 col-12">
                    <span class="nav-link">
                        <i class="fas fa-fw fa-user-friends fa-flip-horizontal"></i>
                        <a href="#">Estado</a>
                        @switch($group->status)
                            @case(1)
                            <span class="float-right badge bg-warning disabled color-palette">
                                Borrador
                            </span>
                                @break
                            @case(2)
                            <span class="float-right badge bg-success disabled color-palette">
                                Activo
                            </span>
                                @break
                            @case(3)
                            <span class="float-right badge bg-secondary disabled color-palette">
                                Terminado
                            </span>
                                @break
                        @endswitch
                    </span>
                </div>
            </div>
        </div>
    </div>                        

    <x-adminlte-modal id="modalCustom" title="Asignar Docente" size="md" theme="teal"
        icon="fas fa-bell" v-centered scrollable>
        <div>
            <form id="frmAsgin" method="post">
            {{ csrf_field() }}
            <input type="hidden" class="group_id" name="group_id">
            <input type="hidden" class="school_id" name="school_id" value="{{$school->id}}">
            <div class="flex items-center mt-4">
                <label class="w-32">Docente: </label>
                <x-adminlte-select2 name="docente_id">
                    <option value="">Selecciona el docente a asignar</option>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->name }}</option>
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


    <div>
        {{-- @livewire('admin.school.modal-groups-teacher', ['group' => $group,'school'=>$school], key('modal-teacher' .$group->id)) --}}
    </div>
    <div>
        @livewire('admin.school.modal-groups-course', ['group' => $group,'school'=>$school], key('modal-course-' .$group->id))
    </div>

    @push('js')
    <script>
        $(document).on("click", ".elmodal", function () {
            var ruta = '{{ route('admin.group.asignarTeacher') }}';  
            var Item = $(this).data('toefl');
            $('.group_id').val(Item.id);
            $('#frmAsgin').attr('action', ruta);
        });

        function save(form) {
            $("#" + form).submit();
            
        }


        
    </script>
        
    @endpush

</div>
