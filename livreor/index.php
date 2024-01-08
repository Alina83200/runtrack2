<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <header>
        <div class="container">
            <div class="header_inner">

                <a class="logo">
                    <h3>ACUF</h3>
                </a>
                <nav class="menu">
                    <button class="menu_btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <ul class="menu_list">
                        <li class="menu_close">
                            <button class="menu_close_btn">
                                <img src="images/close_FILL0_wght400_GRAD0_opsz24.svg" alt="">
                            </button>
                        </li>
                        <li class="menu_item">
                            <a href="#">Qui sommes-nous?</a>
                        </li>
                        <li class="menu_item">
                            <a href="#">Activité</a>
                        </li>
                        <li class="menu_item">
                            <a href="#">Aide</a>
                        </li>
                        <li class="menu_item">
                            <a href="#">Avis</a>
                        </li>
                    </ul>

                </nav>
                <search>
                    <div class="user_action">
                        <a class="btn_user_action" href="connexion.php"><img src="images/person_FILL0_wght400_GRAD0_opsz24.svg"
                                alt="persone"></a>
                        <form class="form_user_action" action="" method="POST" >
                            <input type="text" class="form-control" id="login" name="login" placeholder="Login">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password*">
                            <button type="submit" class="btn">OK</button>
                        </form>
                    </div>
                </search>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="hero">
            <div class="top">
                <div class="container">
                    <div class="top_inner">
                        <h1 class="top_title">L'association ACUF
                            <br> (Association Culturelle Ukraine-France)
                        </h1>
                        <p class="top_text">Où les mots dansent, où les âmes s'entrelacent : Ukraine et France, unies
                            par la
                            beauté de la culture.</p>
                        <button class="top_btn"><a href="inscription.php">Rejoindre</a>
                        </button>

                    </div>
                </div>
            </div>
            <div class="benefits">
                <ul class="benefits_list">
                    <li class="benefits_item">
                        <h3 class="benefits_tite">Sauvegarde Culturelle en Couleurs</h3>
                        <p class="benefits_text">Notre association s'engage passionnément à sauvegarder les récits
                            vivants et les nuances
                            vibrantes de l'Ukraine et de la France.
                        </p>
                    </li>
                    <li class="benefits_item">
                        <h3 class="benefits_tite">Créativité au Carrefour Culturel</h3>
                        <p class="benefits_text">Au cœur de notre mission réside la volonté de catalyser l'éclat de la
                            créativité au carrefour
                            des
                            cultures ukrainienne et française. </p>
                    </li>
                    <li class="benefits_item">
                        <h3 class="benefits_tite">Liens Tissés, Amitiés Cultivées</h3>
                        <p class="benefits_text">Tisser des liens au-delà des frontières, notre association cultive des
                            amitiés durables entre
                            les
                            individus passionnés par l'Ukraine et la France. </p>
                    </li>
                </ul>
            </div>
        </section>
        <section class="presentation">
            <div class="container">
                <div class="cont_presen">
                    <h2 class="cont_title">Qui sommes-nous?</h2>
                    <div class="cont_presen_block">
                        <img src="images/two-young-women-with-flag-ukraine-background-sea.png" alt="">

                        <p class="cont_prese_text">Bienvenue à l'Association Culturelle Toulon-Var, fondée en 2023 au
                            cœur
                            de la magnifique ville de
                            Toulon, dans le département du Var. Notre mission est de promouvoir l'échange culturel, de
                            célébrer la diversité artistique locale, d'aider les réfugiés à s'intégrer dans notre
                            communauté, et de soutenir l'adoption d'une perspective ouverte sur le monde. À travers des
                            événements vibrants, des projets collaboratifs et des initiatives éducatives, nous aspirons
                            à
                            enrichir la vie culturelle de notre communauté. En plaçant l'inclusion et la solidarité au
                            cœur
                            de nos actions, nous souhaitons faire de Toulon un foyer dynamique de créativité,
                            d'ouverture
                            d'esprit et d'inclusion.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="activite">
            <div class="container">
                <h2 class="title">Activité</h2>
                <ul class="activite_list">
                    <li class="activite_item">
                        <img class="activite_item_img" src="images/img_1.jpg" alt="">
                        <div class="activite_item_content">
                            <h3 class="activite_item_title">Atelier</h3>
                            <p class="activite_item_text">Explorez votre créativité dans nos ateliers d'art populaire,
                                où l'expression artistique rencontre les traditions folkloriques. <span
                                    class="act_p_hiden"> Plongez dans une
                                    expérience captivante où chaque création raconte une histoire unique.</span></p>
                        </div>
                    </li>
                    <li class="activite_item">
                        <img class="activite_item_img" src="images/img_2.jpg" alt="">
                        <div class="activite_item_content">
                            <h3 class="activite_item_title">Club de conversation</h3>
                            <p class="activite_item_text">Affinez vos compétences linguistiques avec nos cours de
                                français interactifs <span class="act_p_hiden">, offrant une immersion passionnante dans
                                    la langue et la culture.
                                    Apprenez de manière dynamique pour maîtriser le français avec confiance et
                                    aisance.</span></p>
                    </li>
                    <li class="activite_item">
                        <img class="activite_item_img" src="images/img_3.jpg" alt="">
                        <div class="activite_item_content">
                            <h3 class="activite_item_title">Excursions</h3>
                            <p class="activite_item_text">Explorez la beauté de la France avec nos excitantes
                                excursions, découvrant des trésors cachés et des panoramas pittoresques.</p>
                    </li>
                    <li class="activite_item">
                        <img class="activite_item_img" src="images/img_4.jpg" alt="">
                        <div class="activite_item_content">
                            <h3 class="activite_item_title">Ecole</h3>
                            <p class="activite_item_text">L'école du samedi offre aux enfants une expérience éducative
                                enrichissante. <span class="act_p_hiden">Nos programmes
                                    stimulants favorisent la curiosité et l'épanouissement des élèves le
                                    week-end.</span></p>
                    </li>
                </ul>
        </section>
        <section class="mailing_list">
            <div class="container">
                <h2 class="title mailing_list_tite">Voulez-vous en savoir plus sur nous?
                </h2>
                <div class="mailing_list_iner">
                    <p class="mailing_list_text">
                        Rejoignez notre liste de diffusion et restez au courant des dernières actualités de notre
                        association. soyez le premier informé de nos événements, réunions, excursions, conférences et
                        bien
                        plus encore.
                    </p>
                    <form class="mailing_list_form" action="POST">
                        <input class="mailing_list_mail" type="email" placeholder="prenom@mail.com">
                        <button class="mailing_list_btn" type="submit">Rejoindre</button>
                        <label class="mailing_list_label">
                            <input class="checkbox" type="checkbox">
                            <span class="checkbox_style"></span>
                            <p class="checkbox_text">
                                Nous prenons votre seriosli privé et nous nous engageons à protéger vos informations
                                personnelles. En vous inscrivant à notre liste de diffusion, vous acceptez de recevoir
                                des
                                e-mails de périodicité de notre part concernant nos informations sur nos événements.
                            </p>
                        </label>
                    </form>
                </div>
            </div>
        </section>
        <section class="aide">
            <div class="container">
                <div class="cont_aide">
                    <h2 class="title cont_title_aide">Aide pour l'Ukraine</h2>
                    <div class="cont_aide_block">
                        <ul class="cont_aide_img_list">
                            <li class="cont_aide_img_item">
                                <img src="images/gros-plan-personnes-recevant-dons-nourriture.jpg" alt="">
                            </li>
                            <li class="cont_aide_img_item">
                                <img src="images/joyeuse-femme-benevole-tenant-boite-nourriture-pour-don.jpg" alt="">
                            </li>
                        </ul>
                        <div class="cont_aide_content">
                            <p class="cont_aide_text">Soutenez l'Ukraine dans sa crise humanitaire. Votre don financier
                                ou
                                matériel peut fournir des secours immédiats aux familles touchées. Partagez cet appel à
                                l'aide pour sensibiliser et mobiliser davantage de soutien. Chaque contribution compte
                                pour
                                apporter un changement significatif.
                            </p>
                            <button class="cont_aide_btn"><a href="#">Faire un don</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="comment">
            <div class="container">
                <h2 class="title">Ce que disent les participants.</h2>
                <ul class="comment_list">
                    <li class="comment_item">
                        <blockquote>

                            <p class="comment_text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            <cite class="comment_name">Toto Toto</cite>
                        </blockquote>
                    </li>
                    <li class="comment_item">
                        <blockquote>
                            <p class="comment_text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            <cite cclass="comment_name">Toto Toto</cite>
                        </blockquote>
                    </li>
                    <li class="comment_item">
                        <blockquote>
                            <p class="comment_text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            <cite class="comment_name">Toto Toto</cite>
                        </blockquote>
                    </li>
                    <li class="comment_item comment_item-hide">
                        <blockquote>
                            <p class="comment_text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            <cite class="comment_name">Toto Toto</cite>
                        </blockquote>
                    </li>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer_inner">
                <nav class="footer_nav">
                    <h3 class="footer_nav_title">Lorem.</h3>
                    <ul class="footer_nav_list">
                        <li class="footer_nav_item">
                            <a href="#">Qui sommes-nous?</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="#">Activité</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="#">En savoir</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="#">Aide</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="#">Avis</a>
                        </li>
                    </ul>
                </nav>
                <div class="footer_nav_activ">
                    <h3 class="footer_nav_activ_title">Lorem.</h3>
                    <ul class="footer_nav_activ_list">
                        <li class="footer_nav_activ_item"><a href="#"></a>Atelier</li>
                        <li class="footer_nav_activ_item"><a href="#"></a>Club de conversation</li>
                        <li class="footer_nav_activ_item"><a href="#"></a>Excursions</li>
                        <li class="footer_nav_activ_item"><a href="#"></a>Ecole</li>
                    </ul>
                </div>
                <blockquote class="footer_bloc">
                    <p class="footer_bloc_text">Voluptatum quos consequuntur est
                        impedit autem veniam,</p>
                    <cite class="footer_bloc_autor">Lorem ipsum</cite>
                </blockquote>
                <div class="contacts">
                    <h3 class="footer_logo">ACUF</h3>
                    <address>
                        <div class="adress_list">
                            <p>Pour questions:</p>
                            <ul class="footer_cotacts">
                                <li class="footer_phone">
                                    <a href="tel:+00000000000">+0 (000) 000-00-00</a>
                                </li>

                                <li class="footer_email">
                                    <a href="mailto:someone@example.com">someone@example.com</a>
                                </li>
                            </ul>
                        </div>
                    </address>
                </div>
            </div>

            <div class="footer_botton">
                <p class="copyrigt">&copy ACUF, 2023;</p>
            </div>
    </footer>

    <script>
        const menuBtn = document.querySelector(".menu_btn");
        const menuClose = document.querySelector(".menu_close");
        const menuList = document.querySelector(".menu_list");

        menuBtn.addEventListener("click", () => {
            menuList.classList.add("menu_list--open");
        });

        menuClose.addEventListener("click", () => {
            menuList.classList.remove("menu_list--open");
        });

    </script>

</body>

</html>