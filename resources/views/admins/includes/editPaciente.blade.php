<div class="modal fade" id="modal-editar-paciente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                <h4 class="modal-title">
                    Editar Paciente
                </h4>
            </div>
            <form action="#" method="POST" autocomplete="off" id="form-editar-paciente">
                <div class="modal-body">

                    <input id="form-editar-paciente-id" name="id" type="hidden" value="">
                    {!! csrf_field() !!}
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" class="form-control" name="cedula" id="form-editar-paciente-cedula" placeholder="Cedula">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="iva">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="form-editar-paciente-nombre" placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" class="form-control" name="telefono" id="form-editar-paciente-telefono" placeholder="Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" name="direccion" id="form-editar-paciente-direccion" placeholder="Direccion">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-group formUnidad_medida">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" id="form-editar-paciente-sexo" name="sexo">
                                        <option>Seleccione...</option>
                                        <option value='H'>Hombre</option>
                                        <option value='M'>Mujer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="tipo-sangre">Tipo de Sangre</label>
                                    <select class="form-control" id="form-editar-paciente-tipo-sangre" name="tipo_sangre" title="select-tipo-sangre">
                                        <option>Seleccione...</option>
                                        <option value='O'>O</option>
                                        <option value='B'>B</option>
                                        <option value='AB'>AB</option>
                                        <option value='A'>A</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="RH">RH</label>
                                <select class="form-control" id="form-editar-paciente-RH" name="RH" title="select-RH">
                                    <option>Seleccione...</option>
                                    <option value='+'>+</option>
                                    <option value='-'>-</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-default-outline" data-dismiss="modal" type="button">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@push('script')

<script>


    $('.editar-paciente').on('click', function (e) {
        e.preventDefault();
        var fila = $(this).parents('tr');
        var id = fila.data('id');
        $.ajax({
            type: 'GET',
            url: 'pacientes/' + id,
            success: function (data) {
                console.log(data);
                $('#form-editar-paciente-id').val(data.id);
                $('#form-editar-paciente-nombre').val(data.nombre);
                $('#form-editar-paciente-cedula').val(data.cedula);
                $('#form-editar-paciente-telefono').val(data.telefono);
                $('#form-editar-paciente-direccion').val(data.direccion);
                $('select[id="form-editar-paciente-sexo"]').val(data.sexo);
                $('select[id="form-editar-paciente-tipo-sangre"]').val(data.tipo_sangre);
                $('select[id="form-editar-paciente-RH"]').val(data.RH);

                $("#modal-editar-paciente").modal('toggle');
            }
        });
    });


    $('#form-editar-paciente').submit(function (e) {
        e.preventDefault();

        var id = $("#form-editar-paciente-id").val();

        $.ajax({
            type: 'PUT',
            url: 'pacientes/' + id,
            data: $(this).serialize(),
            success: function () {
                swal(
                    'Editado',
                    'El Paciente ha sido editado',
                    'success'
                ).then(function() {
                    location.reload();
                })
            }
        });
    });

    $('.eliminar-paciente').on('click', function (e) {
        e.preventDefault();
        var fila = $(this).parents('tr');
        var id = fila.data('id');

        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'DELETE',
            url: 'pacientes/' + id,
            data: $(this).serialize(),
            success: function () {
                swal({
                    title: '¿Estas seguro?',
                    text: "No podrás recuperar los datos",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminalo'
                }).then(function () {
                    swal(
                        'Eliminado',
                        'El Paciente ha sido borrado',
                        'success'
                    ).then(function() {
                        location.reload();
                    });
                });
            }
        });
    });

</script>

@endpush