<div class="modal fade" id="modal-agregar-paciente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                <h4 class="modal-title">
                    Agregar Paciente
                </h4>
            </div>
            <form action="{{route('pacientes.store')}}" method="POST" autocomplete="off" id="form-agregar-paciente">
                <div class="modal-body">

                        {!! csrf_field() !!}
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cedula">Cedula</label>
                                    <input type="text" class="form-control" name="cedula" placeholder="Cedula">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="iva">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-group formUnidad_medida">
                                        <label for="sexo">Sexo</label>
                                        <select class="form-control" id="sexo" name="sexo">
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
                                        <select class="form-control" id="tipo-sangre" name="tipo_sangre">
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
                                    <select class="form-control" id="RH" name="RH">
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


</script>

@endpush