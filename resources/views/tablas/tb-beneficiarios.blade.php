<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Institución</th>
            <th>Tipo</th>
            <th>Grupo</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($beneficiarios as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->institucion->nombre }}</td>
                <td>{{ $item->tipo_complemento->nombre }}</td>
                <td>{{ $item->grupo_etario->rango }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>
                    @if($item->estado==1)
                    <button class="btn badge bg-gradient-warning sm" onclick="changeEstado('{{ route('beneficiario.status', $item->id) }}'); ">Activo</button>
                    @else
                    <button class="btn badge bg-gradient-info sm" onclick="changeEstado('{{ route('beneficiario.status', $item->id) }}'); ">Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-insid="{{$item->institucion_id}}" data-jorid="{{$item->jornada_id}}" 
                                data-tipo_id="{{$item->tipo_complemento_id}}" data-grupoid="{{$item->grupo_etario_id}}" data-cantidad="{{$item->cantidad}}"  
                                data-target="#modalEdit">Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>