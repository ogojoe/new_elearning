<div>
    <x-adminlte-modal id="modalCustom{{ $user->id }}" title="Asignar escuela" size="md" theme="teal"
        icon="fas fa-bell" v-centered scrollable>
        <div>
            <div class="flex items-center">
                <label class="w-32">Docente: {{ $name }}</label>
            </div>

            <div class="flex items-center mt-4">
                <label class="w-32">Escuela: {{$escuela_id}}</label>
               {{--  <x-adminlte-select2 name="sel2Basic" id="selectSchool">
                    <option>Selecciona una escuela...</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </x-adminlte-select2> --}}
                <x-adminlte-select2 name="sel2Basic" id="escuela_id" wire:model="escuela_id" :options="$this->schools">
                    <option>Selecciona una escuela...</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </x-adminlte-select2>
                
            </div>
        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Acceptar" wire:click='store' />
            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>
    
    @section('plugins.Select2', true)
</div>
