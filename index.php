<?php
include_once 'config/sessao.php';
$base_path = '';
include_once 'header.php';
?>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 id="hero-title">Bem-vindo ao Pet Club</h1>
                <p id="hero-text">Mantenha seu pet feliz e saudável!</p>
                <?php if (empty($_SESSION['usuario_id'])) { ?>
                    <button class="button" onclick="window.location.href='login/?pg=form-cadastro'">Cadastre-se</button>
                <?php } else { ?>
                    <div>
                        <button class="button" onclick="window.location.href='agendamentos/agendamento.php'"> Meus agendamentos</button>
                    </div>
                <?php } ?>
            </div>
            <div class="hero-image">
                <img src="https://media.istockphoto.com/id/1445781293/pt/foto/cat-and-dog-looking-at-the-camera-in-front-of-food-shelves-in-a-pet-store-the-background-is.jpg?s=612x612&w=0&k=20&c=Suw7Y87mi0vmGN_Ou8PWQLI0nE3mc-Yl6ASAvhv4Wrs="
                    alt="Imagem de destaque" />
            </div>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <h2 id="info-title">Fotos</h2>
            <ul class="info__cards">
                <li class="card">
                    <figure>
                        <img src="https://img.freepik.com/fotos-gratis/cao-adoravel-com-dono-na-pet-shop_23-2148872556.jpg?semt=ais_incoming&w=740&q=80"
                            alt="Imagem Produtos" />
                        <figcaption>Produtos</figcaption>
                    </figure>
                </li>
                <li class="card">
                    <figure>
                        <img src="https://media.gettyimages.com/id/639321736/pt/foto/this-one-loves-the-groomers.jpg?s=612x612&w=gi&k=20&c=BZiFUgzTaHgQRyshERYUbfGZ5GVh8g1MXsaIXBHmcHQ="
                            alt="Atendimento" />
                        <figcaption>Atendimento</figcaption>
                    </figure>
                </li>
                <li class="card">
                    <figure>
                        <img src="https://media.istockphoto.com/id/1308719194/pt/foto/golden-retriver-dog-taking-a-shower-in-a-pet-grooming-salon.jpg?s=612x612&w=0&k=20&c=t6uhoqR_lEEQX0eIJbwQd9q_UrJccy_KILJ7xhKFdhw="
                            alt="Banho" />
                        <figcaption>Banho</figcaption>
                    </figure>
                </li>
                <li class="card">
                    <figure>
                        <img src="https://media.istockphoto.com/id/1041030024/pt/foto/grooming-salon.jpg?s=612x612&w=0&k=20&c=Z5BUDnVf434GVQbDDfgj1n_dnZCVBySXNyVl9PQeGvE="
                            alt="Tosa" />
                        <figcaption>Tosa</figcaption>
                    </figure>
                </li>
            </ul>
        </div>
    </section>
</main>

<?php include_once 'footer.php'; ?>