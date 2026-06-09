<?php

/** @var string $logo */
/** @var array  $projects */
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portfólio de Adriano Lima de Souza - Desenvolvedor Fullstack" />
  <title>Adriano Lima de Souza - Portfólio</title>
  <?= vite('resources/js/script.js') ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist+Mono:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body>
  <a href="#content" class="skip-link">Pular para o conteúdo principal</a>

  <header id="header" class="header-section">
    <nav class="header-nav" aria-label="Navegação principal">
      <ul class="nav-menu">
        <li class="nav-logo"><?= $logo ?></li>

        <li class="nav-list">
          <ul class="list-group" role="list">
            <li><a href="#showcase" class="nav-link">Projetos</a></li>
            <li><a href="#about" class="nav-link">Sobre</a></li>
            <li><a href="#contact" class="nav-link">Contato</a></li>
          </ul>
        </li>

        <li class="nav-resume">
          <a href="" target="_blank" rel="noopener noreferrer" class="resume-link btn-outline">Currículo</a>
        </li>

        <li class="nav-button">
          <button
            class="mobile-nav-toggle btn-outline"
            aria-label="Abrir menu de navegação"
            aria-expanded="false"
            aria-controls="nav-mobile">
            <i class="fa-solid fa-bars-staggered" aria-hidden="true"></i>
          </button>
        </li>
      </ul>
    </nav>

    <nav id="nav-mobile" class="mobile-nav" aria-label="Menu mobile" hidden>
      <ul class="nav-list" role="list">
        <li><a href="#showcase" class="nav-link">Projetos</a></li>
        <li><a href="#about" class="nav-link">Sobre</a></li>
        <li><a href="#contact" class="nav-link">Contato</a></li>
        <li><a href="" class="nav-link">Currículo</a></li>
      </ul>
    </nav>

    <section class="hero-section" aria-labelledby="hero-title">
      <div class="container">
        <h1 id="hero-title" class="hero-title">
          Olá, meu nome é <strong class="accent">Adriano</strong> e sou um
          <span class="subtitle">Desenvolvedor Fullstack</span>
        </h1>

        <div class="hero-cta" role="group" aria-label="Ações principais">
          <a class="cta-link btn-fill" href="#contact">Vamos Conversar</a>
          <a class="cta-link btn-outline" href="#showcase">Meus Projetos</a>
        </div>

        <ul class="hero-socials" aria-label="Redes sociais" role="list">
          <li class="socials-link">
            <a
              class="tooltip grow"
              href=""
              target="_blank"
              rel="noopener noreferrer"
              aria-label="Visite meu perfil no GitHub">
              <i class="fa-brands fa-github " aria-hidden="true"></i>
              <span class="tooltip-text bottom md-right" aria-hidden="true">Github</span>
            </a>
          </li>

          <li class="socials-link">
            <a
              class="tooltip grow"
              href="" target="_blank"
              rel="noopener noreferrer"
              aria-label="Entre em contato via WhatsApp">
              <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
              <span class="tooltip-text bottom md-right" aria-hidden="true">WhatsApp</span>
            </a>
          </li>

          <li class="socials-link">
            <a
              class="tooltip grow"
              href=""
              target="_blank"
              rel="noopener noreferrer"
              aria-label="Conecte-se comigo no LinkedIn">
              <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
              <span class="tooltip-text bottom md-right" aria-hidden="true">LinkedIn</span>
            </a>
          </li>

          <li class="socials-link">
            <a
              class="tooltip grow"
              href="mailto:"
              aria-label="Envie um email">
              <i class="fa-brands fa-google" aria-hidden="true"></i>
              <span class="tooltip-text bottom md-right" aria-hidden="true">Email</span>
            </a>
          </li>
        </ul>
      </div>
    </section>
  </header>

  <main id="content">
    <section id="showcase" class="showcase-section" aria-labelledby="showcase-title">
      <div class="title-section">
        <h2 id="showcase-title" class="title">Projetos <span class="subtitle">em destaque</span></h2>
      </div>

      <ul class="showcase-list" role="list">
        <li class="card">
          <div class="media">
            <img
              src=""
              alt="Imagem do projeto"
              loading="lazy"
              class="hover" />
          </div>

          <div class="content">
            <h3 class="title">Título do Projeto</h3>

            <p class="meta-tags">
              <span>HTML</span>
              <span>CSS</span>
              <span>JavaScript</span>
            </p>

            <p class="description">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint omnis veniam, qui iusto rerum culpa illo nisi quam. Minima provident labore blanditiis quam.
            </p>

            <div class="links" role="group" aria-label="Links do projeto">
              <a
                class="btn-outline"
                href=""
                target="_blank"
                rel="noopener noreferrer">
                Projeto
                <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
              </a>

              <a
                class="btn-fill"
                href=""
                target="_blank"
                rel="noopener noreferrer">
                Código
                <i class="fa-brands fa-github" aria-hidden="true"></i>
              </a>

              <a
                class="btn-outline"
                href=""
                target="_blank"
                rel="noopener noreferrer">
                Packagist
                <i class="fa-solid fa-box-open" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </li>
      </ul>
    </section>

    <section id="projects" class="projects-section" aria-labelledby="projects-title">
      <div class="title-section">
        <h2 id="projects-title" class="title">Outros Projetos</h2>
      </div>

      <ul class="projects-list" role="list">

        <li class="card">
          <div class="media">
            <img
              src=""
              alt="Imagem do projeto"
              loading="lazy" />
          </div>

          <div class="content">
            <div class="links" role="group" aria-label="Links do Card">
              <a
                class="tooltip"
                href=""
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Ver Prévia">
                <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                <span class="tooltip-text bottom" aria-hidden="true">Ver Prévia</span>
              </a>

              <a
                class="tooltip"
                href=""
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Ver código no GitHub">
                <i class="fa-brands fa-github" aria-hidden="true"></i>
                <span class="tooltip-text bottom" aria-hidden="true">Ver Código</span>
              </a>

              <a
                class="tooltip"
                href=""
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Ver projeto no Packagist">
                <i class="fa-solid fa-box-open" aria-hidden="true"></i>
                <span class="tooltip-text bottom" aria-hidden="true">Ver Packagist</span>
              </a>
            </div>

            <h3 class="title">Título do Card</h3>

            <p class="meta-tags">
              <span>HTML</span>
              <span>CSS</span>
              <span>JavaScript</span>
            </p>

            <p class="excerpt">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit temporibus facilis ullam laudantium consequatur porro!
            </p>
          </div>
        </li>
      </ul>
    </section>

    <section id="about" class="about-section" aria-labelledby="about-title">
      <div class="title-section">
        <h2 id="about-title" class="title">Sobre Mim</h2>
      </div>

      <div class="content">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio similique ullam enim dolores nisi corrupti, officiis neque ab voluptatibus odit sed sint! Obcaecati ea quibusdam recusandae in commodi repellendus numquam natus esse reprehenderit, sunt aliquam dolor ad harum provident itaque architecto voluptatem. Officiis inventore quia eius qui officia omnis nulla sequi nihil molestias itaque blanditiis consectetur accusamus fuga deserunt eaque enim et impedit veritatis, laborum asperiores, voluptates quibusdam ipsam.
        </p>

        <p>
          Commodi nostrum rem quod excepturi quae temporibus labore provident sunt quo atque officiis, repellat eos hic similique vel ab facilis voluptas, distinctio maxime ipsa blanditiis nulla! Minus animi, asperiores adipisci dolorum reiciendis illum possimus impedit iure architecto eligendi voluptatum voluptates qui deleniti sunt cumque atque iusto quo quos earum reprehenderit eaque! Tenetur magnam maxime ipsa enim ut, recusandae distinctio dolore delectus, minus aliquid amet esse neque non possimus ad perspiciatis quod voluptates veniam voluptas magni officiis.
        </p>
      </div>

      <div class="skills">
        <div class="skills-group">
          <h3 class="group-title">Back-end</h3>

          <ul class="group-list" role="list">
            <li>amet</li>
            <li>nostrum dicta</li>
            <li>consectetur</li>
            <li>Lorem ipsum dolor</li>
            <li>Aliquam fugiat dolores eaque</li>
          </ul>
        </div>

        <div class="skills-group">
          <h3 class="group-title">Front-end</h3>

          <ul class="group-list" role="list">
            <li>adipisicing</li>
            <li>officiis</li>
            <li>excepturi quae temporibus</li>
            <li>perspiciatis</li>
            <li>possimus</li>
          </ul>
        </div>

        <div class="skills-group">
          <h3 class="group-title">DevOPS & Ferramentas</h3>

          <ul class="group-list" role="list">
            <li>minus aliquid</li>
            <li>quasi</li>
            <li>quis</li>
            <li>elit</li>
          </ul>
        </div>

        <div class="skills-group">
          <h3 class="group-title">Soft Skills</h3>

          <ul class="group-list" role="list">
            <li>perspiciatis</li>
            <li>voluptates</li>
            <li>veniam voluptas</li>
            <li>commodi natus</li>
          </ul>
        </div>
      </div>
    </section>

    <section id="contact" class="contact-section" aria-labelledby="contact-title">
      <div class="title-section">
        <h2 id="contact-title" class="title">
          Contato <span class="subtitle">disponível para trabalho remoto ou presencial</span>
        </h2>
      </div>

      <form
        action=""
        class="contact-form"
        method="POST"
        novalidate
        aria-label="Formulário de contato">
        <div class="form-group">
          <label for="name" class="group-label">Nome</label>
          <input
            type="text"
            id="name"
            name="name"
            required
            placeholder=""
            autocomplete="name"
            class="group-input"
            aria-required="true"
            aria-describedby="name-error" />
          <div class="group-highlight" aria-hidden="true"></div>
          <span id="name-error" class="field-error" role="alert" hidden></span>
        </div>

        <div class="form-group">
          <input
            type="email"
            id="email"
            name="email"
            required
            placeholder=""
            autocomplete="email"
            class="group-input"
            aria-required="true"
            aria-describedby="email-error" />
          <div class="group-highlight" aria-hidden="true"></div>
          <label for="email" class="group-label">Email</label>
          <span id="email-error" class="field-error" role="alert" hidden></span>
        </div>

        <div class="textarea-group">
          <label for="message" class="group-label">Mensagem</label>
          <div class="box">
            <textarea
              id="message"
              name="message"
              required
              class="group-textarea"
              placeholder="Deixe a sua mensagem..."
              aria-required="true"
              aria-describedby="message-error"></textarea>
          </div>
          <span id="message-error" class="field-error" role="alert" hidden></span>
        </div>

        <button class="btn-fill" type="submit">Enviar</button>

        <p class="contact-alternative">
          ou entre em contato através do email <a href="mailto:<?= linkTo('email') ?>"><?= linkTo('email') ?></a>
        </p>

        <div
          class="form-feedback"
          role="status"
          aria-live="polite"
          aria-atomic="true">
        </div>
      </form>
    </section>
  </main>

  <footer class="footer-section">
    <div class="container">
      <div class="upper">
        <div class="group">
          <div class="logo">
            <?= $logo ?>
          </div>

          <ul class="group-list">
            <li>
              <a
                class="tooltip"
                href="<?= linkTo('github') ?>"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Meu perfil no GitHub">
                <i class="fa-brands fa-github " aria-hidden="true"></i>
                <span class="tooltip-text bottom" aria-hidden="true">Github</span>
              </a>
            </li>
            <li>
              <a
                class="tooltip grow"
                href="<?= linkTo('whatsapp') ?>"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Entre em contato via WhatsApp">
                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                <span class="tooltip-text bottom" aria-hidden="true">WhatsApp</span>
              </a>
            </li>
            <li>
              <a
                class="tooltip grow"
                href="<?= linkTo('linkedin') ?>"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Entre em contato no LinkedIn">
                <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
                <span class="tooltip-text bottom" aria-hidden="true">LinkedIn</span>
              </a>
            </li>
          </ul>
        </div>

        <nav class="nav-group" aria-label="Navegação do rodapé">
          <ul class="nav-list" role="list">
            <li><a href="#header">Início</a></li>
            <li><a href="#showcase">Destaques</a></li>
            <li><a href="#projects">Projetos</a></li>
            <li><a href="#about">Sobre</a></li>
            <li><a href="#contact">Contato</a></li>
          </ul>
        </nav>
      </div>
      <div class="lower">
        <hr />

        <p aria-label="Desenvolvido por Adriano, 2026">Desenvolvido por <span>Adriano</span> © 2026</p>
      </div>
    </div>
  </footer>
</body>

</html>
