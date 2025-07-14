<?php
    print_r($_REQUEST);
    echo "<br>";
    print_r($_FILES);
    echo "<br>";
    $nome_img = "Upload de imagens";

    // Verificar se há imagem
    if(isset($_FILES['imagem']) && !empty($_FILES['imagem']))
    {
        // Existe imagem e não está vazio: assim vamos mover o arquivo. 
        // No comando abaixo: move_uploaded_file(("Quem") *(tmp_name que php projeta)", "e para onde vamos enviar + nome do arquivo")
        move_uploaded_file($_FILES['imagem']['tmp_name'], "./img/user/".$_FILES["imagem"]["name"]);
        echo "update realizado com sucesso";
    }

?>

<!-- Aqui vamos inserir o código responsável por fazer o upload das imagens do usuário -->
<!-- Serve para mostrar o código original do vídeo que foi inserido, ele utiliza bootstrap para formatação -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir imagem</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

<br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- o att 'enctype' serve para códifica nosso form para receber arquivos. Ele só funciona com o 'method' post. -->
                <form action="./upload.php" method="post" enctype="multipart/form-data">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome">
                    <br>
                    <label>Selecione a imagem</label>
                    <input type="file" name="imagem" accept="image/*" class="form-control" />
                    <button type="submit"  class="btn btn-success" >
                    Enviar a imagem
                    </button>
                </form>
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>