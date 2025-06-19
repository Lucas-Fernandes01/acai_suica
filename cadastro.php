<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $bairro = $_POST["bairro"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $referencia = $_POST["referencia"];

    // Inserir usuário
    $sql_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql_usuario);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        $id_usuario = $conn->insert_id;

        // Inserir endereço
        $sql_endereco = "INSERT INTO enderecos (id_usuario, bairro, endereco, numero, referencia)
                         VALUES (?, ?, ?, ?, ?)";
        $stmt2 = $conn->prepare($sql_endereco);
        $stmt2->bind_param("issss", $id_usuario, $bairro, $endereco, $numero, $referencia);
        $stmt2->execute();

        echo "<script>alert('Cadastro realizado com sucesso!');window.location='login.html';</script>";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
