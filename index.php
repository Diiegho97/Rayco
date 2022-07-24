<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <title>Prueba JDM</title>
</head>

<body>
    <section class="row">
        <article class="container">
            <center>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Calculadora</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Prueba PHP</h6>
                        <div class="col-auto">
                            <label for="numero1" class="visually-hidden">Escriba numeros</label>
                            <input type="number" class="form-control" id="numero1" min="0" placeholder="Numero 1">
                            <label for="numero2" class="visually-hidden">Escriba numeros</label>
                            <input type="number" class="form-control" id="numero2" min="0" placeholder="Numero 2">
                            <br>
                            <select class="form-select" id="selectOperacion" aria-label="Default select example">
                                <option value="0" selected disabled>Seleccione el Operador</option>
                                <option value="mas">Sumar</option>
                                <option value="menos">Restar</option>
                                <option value="por">Multiplicar</option>
                                <option value="dividir">Dividir</option>
                            </select>
                            <label for="resultado" class="visually-hidden">Resultados</label><br>
                            <input type="text" disabled="disabled" name="resultado" class="form-control" id="resultado" min="0" placeholder="Resultado">
                        </div>
                        <div class="botones">
                            <button type="button" id="enviar" class="btn btn-primary">Calcular</button>
                            <button type="button" id="limpiar" class="btn btn-danger">Limpiar</button>
                        </div>
                    </div>
                </div>
            </center>


            <div class="row">
                <div class=" col-md-3 col-lg-3">
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <table id="table" class="table table-striped table">
                        <thead>
                            <th>Numero1</th>
                            <th>Operacion</th>
                            <th>Numero2</th>
                            <th>Resultado</th>
                            <th>Fecha</th>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </article>


    </section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/jQuery.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>