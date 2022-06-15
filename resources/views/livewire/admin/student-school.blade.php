<div>
    <x-adminlte-modal id="modalCustom{{ $user->id }}" title="Asignar escuela" size="md" theme="teal"
        icon="fas fa-bell" v-centered scrollable>
        <div>
            <div class="flex items-center">
                <label class="w-32">Alumno: {{ $name }}</label>
            </div>

            <div class="flex items-center mt-4">
                <label class="w-32">Escuela: {{ $school_id }}</label>
                <x-adminlte-select2 name="sel2Basic" wire:model="school_id" id="school_id">
                    <option></option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
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
