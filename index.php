<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev. Web - Unipê</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="esquerda">
            <h1>Pet Shop</h1>
        </div>
        <div class="direita">
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 id="hero-title">Bem-vindo ao Pet Shop</h1>
                    <p id="hero-text">Mantenha seu pet feliz e saudável!</p>
                    <button class="button">Cadastre-se</button>
                </div>
                <div class="hero-image">
                    <img 
                        src="https://via.placeholder.com/400x300" 
                        alt="Imagem de destaque"
                    />
                </div>
            </div>
        </section>

        <section class="info">
            <div class="container">
                <h2 id="info-title">Fotos</h2>
                <ul class="info__cards">
                    <li class="card">
                        <figure>
                            <img
                                src="https://via.placeholder.com/300x200"
                                alt="Placeholder 1"
                            />
                            <figcaption>placeholder</figcaption>
                        </figure>
                    </li>
                    <li class="card">
                        <figure>
                            <img
                                src="https://via.placeholder.com/300x200"
                                alt="Placeholder 2"
                            />
                            <figcaption>placeholder</figcaption>
                        </figure>
                    </li>
                    <li class="card">
                        <figure>
                            <img
                                src="https://via.placeholder.com/300x200"
                                alt="Placeholder 3"
                            />
                            <figcaption>placeholder</figcaption>
                        </figure>
                    </li>
                    <li class="card">
                        <figure>
                            <img
                                src="https://via.placeholder.com/300x200"
                                alt="Placeholder 4"
                            />
                            <figcaption>placeholder</figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; site criado como projeto para a disciplina de dev web na Unipê.</p>
    </footer>
</body>
</html>