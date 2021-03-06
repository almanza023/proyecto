<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Nit</th>
            <th>Contacto</th>            
            <th>Municipio</th>           
            <th>Estado</th>
            <th>Opciones</th>                           
        </tr>
    </thead>

    <tbody>
        @foreach ($instituciones as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->nit }}</td>
                <td>{{ $item->contacto }}</td>               
                <td>{{ $item->municipio->nombre }}</td>               
                <td>
                    @if($item->estado==1)
                    <button class="btn badge bg-gradient-warning sm" onclick="changeEstado('{{ route('institucion.status', $item->id) }}'); ">Activo</button>
                    @else
                    <button class="btn badge bg-gradient-info sm" onclick="changeEstado('{{ route('institucion.status', $item->id) }}'); ">Inactivo</button>
                    @endif
                </td>
                <td>

                    <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-info waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-nit="{{$item->nit}}" 
                                data-contacto="{{$item->contacto}}" data-correo="{{$item->correo}}" data-telefono="{{$item->telefono}}" data-direccion="{{$item->direccion}}"
                                data-municipio_id="{{$item->municipio_id}}"
                                data-target="#modalEdit">Actualizar</a>
                            
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>