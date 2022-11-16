<script type="text/javascript" src="vendor/sweetalert/jquery.min.js"></script>
<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>

<?php
    require 'config/conexao.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $tickettype = $_POST['tickettype'];

        if(empty($name) | empty($email) | empty($phone) | empty($tickettype)){
            echo "<script>document.addEventListener('DOMContentLoaded', function(event) {
                swal({
                    title: 'Erro',
                    text: 'O(s) campo(s) podem estar vazio(s). Por favor, tente novamente!',
                    icon: 'error',
                    button: 'Ok',
                }).then(function(result) {
                    if (result) {
                        window.top.location.href = 'javascript:history.back();';
                    } else {
                        window.top.location.href = 'javascript:history.back();';
                    }
                });
            });
            </script>";
            exit();
        } else {
            $sql = "INSERT INTO eventojunho22 (nome, email, telefone, ticket) VALUES ('$name', '$email', '$phone', '$tickettype')";
            if ($conexao->query($sql) === TRUE){
               echo "
                <script>document.addEventListener('DOMContentLoaded', function(event) {
                    swal({
                        title: 'Sucesso!',
                        text: 'Cadastro realizado com sucesso!',
                        icon: 'success',
                        button: 'Ok',
                    }).then(function(result) {
                        if (result) {
                            window.top.location.href = 'obrigado.php';
                        } else {
                            window.top.location.href = 'obrigado.php';
                        }
                    });
                });
                </script>";
                exit();
        } else {
        echo "
            <script>document.addEventListener('DOMContentLoaded', function(event) {
                swal({
                    title: 'Erro!',
                    text: 'Erro ao cadastrar. Por favor, tente novamente!',
                    icon: 'error',
                    button: 'Ok',
                }).then(function(result) {
                    if (result) {
                        window.top.location.href = 'javascript:history.back();';
                    } else {
                        window.top.location.href = 'javascript:history.back();';
                    }
                });
            });
            </script>";
        }
    mysqli_close($conexao);
    }
