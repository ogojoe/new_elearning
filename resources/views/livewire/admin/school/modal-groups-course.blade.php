<div>
    <x-adminlte-modal id="modal-course{{$group->id}}" title="Asignar Curso" size="md" theme="teal"
        icon="fas fa-bell" v-centered scrollable>
        <div>
            <div class="flex items-center">
                <label class="w-32">Grupo: {{ $group->name }}</label>
            </div>

            <div class="flex items-center mt-4">
                <label class="w-32">Cursos:</label>
                <x-adminlte-select2 name="cursito" wire:model.defer='cursito'>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ Str::limit($course->title,25)}}</option>
                    @endforeach
                </x-adminlte-select2>
            </div>
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Aceptar" wire:click='store' />
            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>

    @section('plugins.Select2', true)
</div>