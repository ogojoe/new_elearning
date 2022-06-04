<div>
    <x-adminlte-modal id="modal-default{{$group->id}}" title="Asignar Docente" size="md" theme="teal"
        icon="fas fa-bell" v-centered scrollable>
        <div>
            <div class="flex items-center">
                <label class="w-32">Grupo: {{ $group->name }}</label>
            </div>

            <div class="flex items-center mt-4">
                <label class="w-32">Docente:</label>
                <x-adminlte-select2 name="sel2Basic" wire:model.defer='docente'>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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



