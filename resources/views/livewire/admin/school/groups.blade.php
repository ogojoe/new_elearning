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
                        @else
                        <span role="button" title="Da click para asignar!" data-toggle="modal" data-target="#modal-default{{$group->id}}">
                            Pendiente de asignar
                        </span>
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
                        @else
                        <span role="button" title="Da click para asignar!" data-toggle="modal" data-target="#modal-course{{$group->id}}">
                            Pendiente de asignar
                        </span>
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

    <div>
        @livewire('admin.school.modal-groups-teacher', ['group' => $group,'school'=>$school], key('modal-teacher' .$group->id))
    </div>
    <div>
        @livewire('admin.school.modal-groups-course', ['group' => $group,'school'=>$school], key('modal-course-' .$group->id))
    </div>

</div>
