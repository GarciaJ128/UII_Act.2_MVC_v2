<h1 class="page-header">Libreria DenysTale</h1>
<h2>Tabla: tbl_libro</h2>
<p>Garcia Joaquin Jennifer Denisse</p>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Libro&a=Crud">Agregar Libro</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th >Titulo</th>
            <th>ID Autor</th>
            <th>Editorial</th>
            <th >Año</th>
            <th >Genero</th>
            <th >Precio</th>
            <th >Stock</th>
            <th >Portada</th>
            <th ></th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->titulo; ?></td>
            <td><?php echo $r->id_autor; ?></td>
            <td><?php echo $r->editorial; ?></td>
            <td><?php echo $r->anio; ?></td>
            <td><?php echo $r->genero; ?></td>
            <td><?php echo $r->precio; ?></td>
            <td><?php echo $r->stock; ?></td>
            <td><?php echo '<img height="200" width= "130" src="data:image/jpeg;base64,' . base64_encode($r->portada) . '"/>' ?></td>
            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Libro&a=Crud&id_libro=<?php echo $r->id_libro; ?>"> Editar</a></i>
            </td>
            <td>
                <i class="glyphicon glyphicon-remove"><a href="?c=Libro&a=Eliminar&id_libro=<?php echo $r->id_libro; ?>"> Eliminar</a></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
