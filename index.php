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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

    <link rel="stylesheet" href="style.css">

    <title>Página Informações</title>
    <link rel="icon" type="img/px_white.ico" href="img/favicon.ico">
    
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.19/jquery.inputmask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <div class="container_head" id="header">
        <div class="column">
            <h1>A melhor maneira de transportar sua carga em <span style="font-weight: bold;color: var(--color5);">poucos cliques</span></h1>.
            <h2>Com mais de 1235 Empresas utilizando nossa plataforma, a PX facilita o dia a dia da contratação de motoristas qualificados para a sua demanda, zerando custos extras e simplificando seus encargos.</h2>
            <a class="button" href="#form_section">Quero fazer parte</a>
        </div>
        <div class="column logo">
            <img class="full_logo" style="width: 444.5px; height: 84px;" src="img\Motorista_PX_White.png" />
        </div>
    </div>

    <div class="partner_companies">
        <p>Conheça algumas das empresas parceiras</p>
        <div class="company_slider">
            <div class="company_list">
                <ul>
                    <li><img src="img/PX_White.png" alt="" /></li>
                    <li><img src="img/PX_White.png" alt="" /></li>
                    <li><img src="img/PX_White.png" alt="" /></li>
                    <li><img src="img/PX_White.png" alt="" /></li>
                    <li><img src="img/PX_White.png" alt="" /></li>
                    <li><img src="img/PX_White.png" alt="" /></li>
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="form" id="form_section">
        <form action="index.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <div class="input_form">
                    <input type="text" name="name" id="name" class="input_user">
                    <label for="name" class="label_input">Nome completo</label>
                </div>
                <div class="input_form">
                    <input type="text" name="email" id="email" class="input_user">
                    <label for="email" class="label_input">Email</label>
                </div>
                <div class="input_form">
                    <input type="tel" name="phone" id="phone" class="input_user" placeholder="(11) 91234-5678">
                    <label for="phone" class="label_input">Telefone</label>
                </div>
                <div class="input_form">
                    <input type="text" name="company" id="company" class="input_user">
                    <label for="company" class="label_input">Empresa</label>
                </div>
                <div class="input_form">
                    <label for="position" class="label_input">Seu Cargo</label>
                    <select name="position" id="position">
                        <option>Selecione</option>
                        <option value="driver">Motorista</option>
                        <option value="fleet_manager">Gestor de Frota</option>
                        <option value="hr">RH</option>
                        <option value="logistics_director">Diretor de Logística</option>
                        <option value="owner">Proprietário</option>
                    </select>
                </div>
                <div class="input_form">
                    <label for="truck_quantity"><b>Quantidade de caminhões</b></label>
                    <input type="number" name="truck_quantity" id="truck_quantity">
                </div>
                <div class="input_form">
                    <input type="text" name="state" id="state" class="input_user">
                    <label for="state" class="label_input">UF</label>
                </div>
                <div class="input_form">
                    <input type="text" name="city" id="city" class="input_user">
                    <label for="city" class="label_input">Cidade</label>
                </div>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

    <div class="about-company">
        <div class="column logo">
            <img class="complete_logo" style="width: 444.5px; height: 84px;" src="img\Motorista_PX_White.png" />
        </div>
        <div class="column">
            <p class="dynamic-text">Economize <span id="dynamic-text" style="font-weight: bold;color: var(--color5);">Tempo</span> com os nossos motoristas</p>
            <p>Se você tem caminhões parados, na plataforma PX você encontra motoristas compartilhados e escolha o profissional certo para a sua operação em menos de 48 horas.
                Sem custos extras, com maior segurança e sem burocracia.</p>
            <a class="button" href="#div_formulario">Saber Mais</a>
        </div>
    </div>

    <footer class="footer_section">
        <div class="footer_logo">
            <img class="full_logo" style="width: 444.5px; height: 84px;" src="img\Motorista_PX_White.png" />
        </div>
        <div class="footer_info">
            <p>sobre a PX</p>
            <ul>
                <li>Localização</li>
            </ul>
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
