<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <!-- Crear un contenedor -->
    <div class="container">
    <?php if(session('error')){?>
        
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session('error')?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
    <?php }?>
    <?php if(session('mensaje')){?>
        
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('mensaje')?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
    <?php }?>