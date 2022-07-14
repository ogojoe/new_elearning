<div>
    <x-adminlte-modal id="modal-default{{$group->id}}" title="Asignar Docente" size="md" theme="teal"
        icon="fas fa-bell" v-centered scrollable>
        <div>
            <div class="flex items-center">
                <label class="w-32">Grupo: {{ $group->name }}</label>
            </div>

            <div class="flex items-center mt-4">
                <label class="w-32">Docente: {{$docente}}</label>
                {{-- <x-adminlte-select2 name="sel2Basic" wire:model.defer='docente'>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </x-adminlte-select2> --}}
                <div wire:ignore>
                    <select class="select2" name="teacher">
                        @foreach ($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
                </div>




            </div>
            
        </div>
        <x-slot name="footerSlot">
            {{-- <x-adminlte-button class="mr-auto" theme="success" label="Aceptar" wire:click='update' />
            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" /> --}}
        </x-slot>
    </x-adminlte-modal>

    {{-- @section('plugins.Select2', true) --}}

    @push('js')
        <script>
            $(function() {
                $('.select2').select2();
            }).on('change',function(e){
                /* @this.set('docente', e.target.value); */
                /* alert(e.target.value); */
                Livewire.emit('selectTeacher',e.target.value);
            });
        </script>
    @endpush


</div>



