<h1 class="page-header">
    <?php echo $alm->id_libro != null ? $alm->titulo : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Libro">Libros</a></li>
    <li class="active">
        <?php echo $alm->id_libro != null ? $alm->titulo : 'Nuevo Registro'; ?>
    </li>
</ol>

<form action="?c=Libro&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_libro" value="<?php echo $alm->id_libro; ?>" />

    <div class="form-group">
        <label>Titulo</label>
        <input type="text" name="titulo" value="<?php echo $alm->titulo; ?>" class="form-control"
            placeholder="Ingrese el titulo del libro" data-validacion-tipo="requerido|min:2" />
    </div>
    

    <div class="form-group">
        <label>ID Autor</label>
        <input type="number" name="id_autor" value="<?php echo $alm->id_autor; ?>" class="form-control"
            placeholder="Ingrese el ID del Autor" data-validacion-tipo="requerido|entero:1" />
    </div>

    <div class="form-group">
        <label>Editorial</label>
        <input type="text" name="editorial" value="<?php echo $alm->editorial; ?>" class="form-control"
            placeholder="Ingrese el nombre de la editorial" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Año</label>
        <input type="number" name="anio" value="<?php echo $alm->anio; ?>" class="form-control"
            placeholder="Ingrese su año" data-validacion-tipo="requerido|min:4" />
    </div>

    <div class="form-group">
        <label>Genero</label>
        <input type="text" name="genero" value="<?php echo $alm->genero; ?>" class="form-control"
            placeholder="Ingrese el genero" data-validacion-tipo="requerido|min:4" />
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="precio" value="<?php echo $alm->precio; ?>" class="form-control"
            placeholder="Ingrese el precio" data-validacion-tipo="requerido|min:2" />
    </div>

    <div class="form-group">
        <label>Stock</label>
        <input type="text" name="stock" value="<?php echo $alm->stock; ?>" class="form-control"
            placeholder="Ingrese la cantidad en el stock" data-validacion-tipo="requerido|min:1" />
    </div>

    <div class="form-group">
        <label>Portada</label>
        <?php if ($alm->id_libro != null && !empty($alm->portada)): ?>
            <img height="235" width="150" src="data:image/jpeg;base64,<?php echo base64_encode($alm->portada); ?>" />
        <?php endif; ?>
        <input type="file" name="portada" class="form-control" <?php echo $alm->id_libro == null ? 'required' : ''; ?> />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    // $(document).ready(function(){
    //     $("#frm-alumno").submit(function(){
    //         return $(this).validate();
    //     });
    // })
    $(document).ready(function () {
        $("form").submit(function () {
            return $(this).validate();
        });
    });
</script>