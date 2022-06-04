@props(['group'])
<div class="col-md-3">
    <div class="card card-widget widget-user text-white">
        <div class="widget-user-header h-auto bg-cyan">
            <h3 class="widget-user-username font-bold text-center mb-2">{{$group->name}}</h3>
            <h6 class="widget-user-desc text-justify">{{ Str::limit($group->course->title,25)}}</h6>
        </div>
        <div class="card-body bg-gradient-dark">
            <div class="col-12 text-center border-bottom border-secondary">
                <span class="nav-link">
                    Periodo: {{$group->periodo}}
                </span>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="#" class="text-white" title="alumnos">
                        <div class="description-block">
                            <i class="fas fa-2x fa-list text-orange"></i>
                            <h6 class="description-header">
                                Alumnos
                            </h6>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{route('admin.school.group.show',['school' => $group->school, 'group' => $group])}}" class="text-white" title="resultados">
                        <div class="description-block">
                            <i class="fas fa-2x fa-chart-line text-orange"></i>
                            <h5 class="description-header">
                                Resultados
                            </h5>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>