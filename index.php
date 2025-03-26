<?php

if (isset($_POST['submit'])) {
    include_once('config.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $truck_quantity = $_POST['truck_quantity'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    $stmt = $connection->prepare("INSERT INTO leads (name, email, phone, company, position, truck_quantity, state, city) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $email, $phone, $company, $position, $truck_quantity, $state, $city);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Informações</title>
    <link rel="stylesheet" href="style_page.css">
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.19/jquery.inputmask.min.js"></script>

    <div class="container_head" id="header">
        <div class="column">
            <div class="title_head_section">
                <h1 class="title_head">A melhor maneira de transportar sua carga em <span style="font-weight: bold;color: var(--color5);">poucos cliques</span></h1>
                <p class="subtitle_head">Com <b>mais de 1235 Empresas</b> utilizando nossa plataforma, a PX facilita o dia a dia da contratação de <b>motoristas qualificados</b> para a sua demanda, <b>zerando custos extras</b> e simplificando seus encargos.</p>
            </div>

            <a class="button" href="#form_section">Quero fazer parte</a>
        </div>
        <div class="column logo">
            <img class="full_logo" style="width: 444.5px; height: 84px;" src="img\Motorista_PX_White.svg" />
        </div>
    </div>

    <div class="partner_companies">
        <p class="title_partner_companies">Conheça algumas das empresas parceiras</p>
        <div class="company_list">
        </div>
    </div>


    <div class="form" id="form_section">

        <div class="input_info_text">
            <p class="title_form_section">
                O <span style="font-weight: bold;color: var(--color5);">Motorista Ideal</span> para o seu caminhão
            </p>
            <p class="subtitle_form_section">
                O motorista que você precisa quando você precisa. Temos a maior rede de motoristas qualificados do Brasil, que vão desde utilitários a tritrens.

                Lance o contrato com todas as especificações necessárias e escolha o Motorista PX ideal para fazer a sua viagem.
            </p>
        </div>

        <form class="client_form" action="index.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <div class="input_line">
                    <div class="input_form">
                        <label for="name" class="label_input">Nome completo</label>
                        <input type="text" name="name" id="name" class="input_user" placeholder="Digite seu nome" required>
                    </div>
                    <div class="input_form">
                        <label for="email" class="label_input">Email</label>
                        <input type="email" name="email" id="email" class="input_user" placeholder="Digite seu email" required>
                    </div>
                </div>

                <div class="input_line">
                    <div class="input_form">
                        <label for="phone" class="label_input">Telefone</label>
                        <input type="tel" name="phone" id="phone" class="input_user" placeholder="(XX) XXXXX-XXXX" required>
                    </div>
                    <div class="input_form">
                        <label for="company" class="label_input">Empresa</label>
                        <input type="text" name="company" id="company" class="input_user" placeholder="Nome da empresa">
                    </div>
                </div>

                <div class="input_line">
                    <div class="input_form">
                        <label for="position" class="label_input">Seu Cargo</label>
                        <select name="position" id="position" required>
                            <option value="">Selecione</option>
                            <option value="driver">Motorista</option>
                            <option value="fleet_manager">Gestor de Frota</option>
                            <option value="hr">RH</option>
                            <option value="logistics_director">Diretor de Logística</option>
                            <option value="owner">Proprietário</option>
                        </select>
                    </div>
                    <div class="input_form">
                        <label for="truck_quantity" class="label_input">Quantidade de caminhões</label>
                        <input type="number" name="truck_quantity" id="truck_quantity" class="input_user" placeholder="Número de caminhões">
                    </div>
                </div>

                <div class="input_line">
                    <div class="input_form">
                        <label for="state" class="label_input">UF</label>
                        <input type="text" name="state" id="state" class="input_user" placeholder="Ex: SP, RJ, MG">
                    </div>
                    <div class="input_form">
                        <label for="city" class="label_input">Cidade</label>
                        <input type="text" name="city" id="city" class="input_user" placeholder="Nome da cidade">
                    </div>
                </div>
                <input class="button" type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

    <div class="about-company">
        <div class="column logo">
            <img class="complete_logo" style="width: 69%" src="img\Ativo-7.webp" />
        </div>
        <div class="column text_info_section">
            <div class="company_text_section">
                <p class="dynamic-text">Economize <span id="dynamic-text" style="font-weight: bold;color: var(--color5);">Tempo</span> com os nossos motoristas</p>
                <p class="dynamic_text_subtitle">Se você tem caminhões parados, na plataforma PX você encontra motoristas compartilhados e escolha o profissional certo para a sua operação em menos de 48 horas.
                    Sem custos extras, com maior segurança e sem burocracia.</p>
            </div>

            <a class="button" href="#form_section">Saber Mais</a>
        </div>
    </div>

    <footer class="footer_section">
        <div class="footer_logo">
            <img class="full_logo" style="width: 444.5px; height: 84px;" src="img\Motorista_PX_White.svg" />
        </div>
    </footer>


    <script>
        const texts = ["Dinheiro", "Combustível"];
        let currentIndex = 0;

        function changeText() {
            currentIndex = (currentIndex + 1) % texts.length;
            document.getElementById("dynamic-text").innerText = texts[currentIndex];
        }

        setInterval(changeText, 1000);

        $(document).ready(function() {
            $('#phone').inputmask({
                mask: '(99) 99999-9999',
                placeholder: ' ',
                showMaskOnHover: false,
                clearIncomplete: true
            });
        });
    </script>
</body>

</html>