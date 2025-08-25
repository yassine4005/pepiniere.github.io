<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pepiniere d'entreprises</title>
  <link rel="icon" href="favic.ico"><link href="style.css" rel="stylesheet">
  <style>
  .om {
  width: 80px; /* ou une autre taille que tu souhaites */
  height: 80px; /* pour garder les proportions */
}
  </style>
</head>
  <body
    x-data="{ page: 'home', 'darkMode': true, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'b eh': darkMode === true}"
  >
    <!-- ===== Header Start ===== -->
    <header
  class="g s r vd ya cj"
  :class="{ 'hh sm _k dj bl ll' : stickyMenu }"
  @scroll.window="stickyMenu = (window.pageYOffset > 20) ? true : false"
>
  <div class="bb ze ki xn 2xl:ud-px-0 oo wf yf i">
    <div class="vd to/4 tc wf yf">
      <a href="index.php">
        <img class="om" href="index.php" src="images/l.png" alt="Logo Light" />
  
      </a>

      <!-- Hamburger Toggle BTN -->
      <button class="po rc" @click="navigationOpen = !navigationOpen">
        <span class="rc i pf re pd">
          <span class="du-block h q vd yc">
            <span class="rc i r s eh um tg te rd eb ml jl dl" :class="{ 'ue el': !navigationOpen }"></span>
            <span class="rc i r s eh um tg te rd eb ml jl fl" :class="{ 'ue qr': !navigationOpen }"></span>
            <span class="rc i r s eh um tg te rd eb ml jl gl" :class="{ 'ue hl': !navigationOpen }"></span>
          </span>
          <span class="du-block h q vd yc lf">
            <span class="rc eh um tg ml jl el h na r ve yc" :class="{ 'sd dl': !navigationOpen }"></span>
            <span class="rc eh um tg ml jl qr h s pa vd rd" :class="{ 'sd rr': !navigationOpen }"></span>
          </span>
        </span>
      </button>
      <!-- Hamburger Toggle BTN -->
    </div>

    <div
      class="vd wo/4 sd qo f ho oo wf yf"
      :class="{ 'd hh rm sr td ud qg ug jc yh': navigationOpen }"
    >
      <nav>
        <ul class="tc _o sf yo cg ep">
          <li><a href="index.php" class="xl" :class="{ 'mk': page === 'home' }">Acceuil</a></li>
          <li><a href="index.php#features" class="xl">caractéristiques</a></li>
          <li class="c i" x-data="{ dropdown: false }">
            
            
            <a
              href="#"
              class="xl tc wf yf bg"
              @click.prevent="dropdown = !dropdown"
              :class="{ 'mk':page === 'signin' || page === 'signup' || page === '404' }"
            >
              Pages

              <svg
              :class="{ 'wh': dropdown }"
              class="th mm we fd pf" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
              </svg>
            </a>

            <!-- Dropdown Start -->
            <ul class="a" :class="{ 'tc': dropdown }">
              <?php if (isset($_SESSION['user_id'])): ?>
             <a href="account.php">Mon compte</a>
             <?php else: ?>
             <a href="signin.php">Se connecter</a>  <a href="signup.php">S'inscrire</a>
            <?php endif; ?>
             
            </ul>
            <!-- Dropdown End -->
             
          </li>
          
        </ul>
             <img class="om" href="index.php" src="images/api.png" alt="Logo Light" />
      </nav>

      <div class="tc wf ig pb no">
        <div class="pc h io pa ra" :class="navigationOpen ? '!-ud-visible' : 'd'">
          <label class="rc ab i">
            <input type="checkbox" :value="darkMode" @change="darkMode = !darkMode" class="pf vd yc uk h r za ab" />
            <!-- Icon Sun -->
            <svg :class="{ 'wn' : page === 'home', 'xh' : page === 'home' && stickyMenu }" class="th om" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.0908 18.6363C10.3549 18.6363 8.69 17.9467 7.46249 16.7192C6.23497 15.4916 5.54537 13.8268 5.54537 12.0908C5.54537 10.3549 6.23497 8.69 7.46249 7.46249C8.69 6.23497 10.3549 5.54537 12.0908 5.54537C13.8268 5.54537 15.4916 6.23497 16.7192 7.46249C17.9467 8.69 18.6363 10.3549 18.6363 12.0908C18.6363 13.8268 17.9467 15.4916 16.7192 16.7192C15.4916 17.9467 13.8268 18.6363 12.0908 18.6363ZM12.0908 16.4545C13.2481 16.4545 14.358 15.9947 15.1764 15.1764C15.9947 14.358 16.4545 13.2481 16.4545 12.0908C16.4545 10.9335 15.9947 9.8236 15.1764 9.00526C14.358 8.18692 13.2481 7.72718 12.0908 7.72718C10.9335 7.72718 9.8236 8.18692 9.00526 9.00526C8.18692 9.8236 7.72718 10.9335 7.72718 12.0908C7.72718 13.2481 8.18692 14.358 9.00526 15.1764C9.8236 15.9947 10.9335 16.4545 12.0908 16.4545ZM10.9999 0.0908203H13.1817V3.36355H10.9999V0.0908203ZM10.9999 20.8181H13.1817V24.0908H10.9999V20.8181ZM2.83446 4.377L4.377 2.83446L6.69082 5.14828L5.14828 6.69082L2.83446 4.37809V4.377ZM17.4908 19.0334L19.0334 17.4908L21.3472 19.8046L19.8046 21.3472L17.4908 19.0334ZM19.8046 2.83337L21.3472 4.377L19.0334 6.69082L17.4908 5.14828L19.8046 2.83446V2.83337ZM5.14828 17.4908L6.69082 19.0334L4.377 21.3472L2.83446 19.8046L5.14828 17.4908ZM24.0908 10.9999V13.1817H20.8181V10.9999H24.0908ZM3.36355 10.9999V13.1817H0.0908203V10.9999H3.36355Z" fill=""/>
            </svg>
            <!-- Icon Sun -->
            <img class="xc nm" src="images/icon-moon.svg" alt="Moon" />
          </label>
        </div>

        <a href="signin.php" :class="{ 'nk yl' : page === 'home', 'ok' : page === 'home' && stickyMenu }" class="ek pk xl">Se Connecter</a>
        <a href="signup.php" :class="{ 'hh/[0.15]' : page === 'home', 'sh' : page === 'home' && stickyMenu }" class="lk gh dk rg tc wf xf _l gi hi">Créer un Compte</a>
      </div>
    </div>
  </div>
</header>

    <!-- ===== Header End ===== -->

    <main>
      <!-- ===== Hero Start ===== -->
      <section class="gj do ir hj sp jr i pg">
        <!-- Hero Images -->
        <div class="xc fn zd/2 2xl:ud-w-187.5 bd 2xl:ud-h-171.5 h q r">
          <img src="images/shape-01.svg" alt="shape" class="xc 2xl:ud-block h t -ud-left-[10%] ua" />
          <img src="images/shape-02.svg" alt="shape" class="xc 2xl:ud-block h u p va" />
          <img src="images/shape-03.svg" alt="shape" class="xc 2xl:ud-block h v w va" />
         
       <img src="images/pep.jpg" alt="Woman" style="width:700px; height:700px; border-radius:50%; object-fit:cover;" class="q r ua" />


        </div>

        <!-- Hero Content -->
        <div class="bb ze ki xn 2xl:ud-px-0">
          <div class="tc _o">
            <div class="animate_left jn/2">
              <h1 class="fk vj zp or kk wm wb">La pépinière d’entreprises soutient les créateurs dans le lancement et le développement de leur activité.</h1>
              <p class="fq">
                La pépinière d’entreprises offre un accompagnement personnalisé aux porteurs de projets et jeunes entrepreneurs. Elle met à leur disposition des locaux, des conseils, et un réseau de partenaires pour faciliter le démarrage et le développement de leur activité dans un environnement propice à la réussite.
              </p>

              <div class="tc tf yo zf mb">
                <a href="#" class="ek jk lk gh gi hi rg ml il vc _d _l"
                  >Commencez maintenant</a
                >

                <span class="tc sf">
                  <a href="#" class="inline-block ek xj kk wm">  Appelez-nous  </a>
                  <span class="inline-block"> Pour toute question +21670162943</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Hero End ===== -->

      <!-- ===== Small Features Start ===== -->
      <section id="features">
        <div class="bb ze ki yn 2xl:ud-px-12.5">
          <div class="tc uf zo xf ap zf bp mq">
            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg mh">
                <img src="images/icon-01.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb">FORMATION</h4>
                <p>La pépinière d’entreprises organise régulièrement des sessions de formation destinées à guider les jeunes porteurs de projets dès la phase de génération d’idées entrepreneuriales jusqu’à la structuration complète de leur parcours. Ces formations permettent aux participants de développer leur esprit entrepreneurial et de mieux comprendre les étapes essentielles pour réussir dans le monde des affaires. Elles se concentrent principalement sur des domaines innovants, tels que les nouvelles technologies, le digital, l’intelligence artificielle, l’énergie renouvelable, et d’autres secteurs porteurs, afin de doter les futurs entrepreneurs des compétences adaptées aux besoins actuels du marché.</p>
              </div>
            </div>

            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg nh">
                <img src="images/icon-02.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb">Accompagnement</h4>
                <p>En plus des formations, la pépinière assure un accompagnement personnalisé à travers des séances de coaching individuel et collectif. Cet appui vise à aider les promoteurs dans la préparation de leur plan d’affaires, l’élaboration de leur étude de marché et de faisabilité financière, ainsi que dans la structuration de leurs projets. Les coachs et experts de la pépinière guident également les entrepreneurs dans la constitution des dossiers nécessaires pour obtenir des financements et pour accéder à la labellisation de leurs startups. Cet accompagnement de proximité constitue un véritable levier pour transformer une idée en projet viable et durable.</p>

              </div>
            </div>

            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg oh">
                <img src="images/icon-03.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb">Hébergement</h4>
                <p>La pépinière met à la disposition des jeunes entrepreneurs des bureaux modernes et bien équipés, favorisant un environnement de travail collaboratif et stimulant. Cet appui logistique a pour objectif d’alléger les charges locatives souvent lourdes pour les nouveaux promoteurs au démarrage de leur activité. En offrant des espaces adaptés, connectés et propices à l’innovation, la pépinière permet aux jeunes entreprises de se concentrer pleinement sur le développement de leurs projets, tout en bénéficiant d’un cadre favorable à l’échange, au réseautage et à la créativité.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Small Features End ===== -->

      <!-- ===== About Start ===== -->
      <section class="ji gp uq 2xl:ud-py-35 pg">
        <div class="bb ze ki xn wq">
          <div class="tc wf gg qq">
            <!-- About Images -->
            <div class="animate_left xc gn gg jn/2 i">
              <div>
                <img src="images/shape-05.svg" alt="Shape" class="h -ud-left-5 x" />
            
                
              </div>
              <div>
                <img src="images/shape-06.svg" alt="Shape" />
                <img src="images/a.jpg" alt="About" class="ob gb" />
                <img src="images/shape-07.svg" alt="Shape" class="bb" />
              </div>
            </div>

            <!-- About Content -->
            <div class="animate_right jn/2">
              <h4 class="ek yj mk gb">Pourquoi nous choisir</h4>
              <h2 class="fk vj zp pr kk wm qb">Nous vous offrons les meilleurs services pour développer votre entreprise.</h2>
             

              <a href="https://www.facebook.com/reel/741702001706514" data-fslightbox class="vc wf hg mb">
                <span class="tc wf xf be dd rg i gh ua">
                  <span class="nf h vc yc vd rg gh qk -ud-z-1"></span>
                  <img src="images/icon-play.svg" alt="Play" />
                </span>
                <span class="kk">VOIR COMMENT NOUS TRAVAILLONS</span>
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== About End ===== -->

      <!-- ===== Team Start ===== -->
      <section class="i pg ji gp uq">
        <!-- Bg Shapes -->
        <span class="rc h s r vd fd/5 fh rm"></span>
        <img src="images/shape-08.svg" alt="Shape Bg" class="h q r" />
        <img src="images/shape-09.svg" alt="Shape" class="of h y z/2" />
        <img src="images/shape-10.svg" alt="Shape" class="h _ aa" />
        <img src="images/shape-11.svg" alt="Shape" class="of h m ba" />

        <!-- Section Title Start -->
        <div
          x-data="{ sectionTitle: `Meet With Our Creative Dedicated Team`, sectionTitleText: `Lorem ipsum dolor sit amet, consectetur adipiscing elit. In convallis tortor eros. Donec vitae tortor lacus. Phasellus aliquam ante in maximus.`}"
        >
          <div class="animate_top bb ze rj ki xn vq">
    <h2
            x-text="sectionTitle"
            class="fk vj pr kk wm on/5 gq/2 bb _b"
    >
    </h2>
    <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
</div>


        </div>
        <!-- Section Title End -->

        <div class="bb ze i va ki xn xq jb jo">
          <div class="wc qf pn xo gg cp">
            <!-- Team Item -->
            <div class="animate_top rj">
              <div class="c i pg z-1">
               

                <div class="ef im nl il">
                  <span class="h -ud-left-5 -ud-bottom-21 rc de gd gh if wa"></span>
                  <span class="h s p rc vd hd mh va"></span>
                  <div class="h s p vd ij jj xa">
                   
                  </div>
                </div>
              </div>

             
            </div>

            <!-- Team Item -->
            <div class="animate_top rj">
              <div class="c i pg z-1">
               

                <div class="ef im nl il">
                  <span class="h -ud-left-5 -ud-bottom-21 rc de gd gh if wa"></span>
                  <span class="h s p rc vd hd mh va"></span>
                  <div class="h s p vd ij jj xa">
                   
                  </div>
                </div>
              </div>

              
            </div>

            <!-- Team Item -->
            <div class="animate_top rj">
              <div class="c i pg z-1">
               

                <div class="ef im nl il">
                  <span class="h -ud-left-5 -ud-bottom-21 rc de gd gh if wa"></span>
                  <span class="h s p rc vd hd mh va"></span>
                  <div class="h s p vd ij jj xa">
                    <ul class="tc xf wf gg">
                      <li>
                       
                      </li>
                      <li>
                       
                      </li>
                      <li>
                       
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Team End ===== -->

      <!-- ===== Services Start ===== -->
      <section class="lj tp kr">
        <!-- Section Title Start -->
        <div
          x-data="{ sectionTitle: `We Offer The Best Quality Service for You`, sectionTitleText: `Lorem ipsum dolor sit amet, consectetur adipiscing elit. In convallis tortor eros. Donec vitae tortor lacus. Phasellus aliquam ante in maximus.`}"
        >
          <div class="animate_top bb ze rj ki xn vq">
    <h2
            x-text="sectionTitle"
            class="fk vj pr kk wm on/5 gq/2 bb _b"
    >
    </h2>
    <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
</div>


        </div>
        <!-- Section Title End -->

        <div class="bb ze ki xn yq mb en">
          <div class="wc qf pn xo ng">
            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="images/icon-04.jpg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b">FORMATION EXCEPTIONNELLE – IA & CRÉATIVITÉ NUMÉRIQUE</h4>
              
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="images/icon-05.jpg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b"> Summer Tech 2025 – Challenge Young Start APII</h4>
              
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="images/icon-06.jpg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b">Atelier sur le robot suiveur de ligne
</h4>
              
            </div>

            <!-- Service Item -->
           
          </div>
        </div>
      </section>
      <!-- ===== Services End ===== -->

      <!-- ===== Pricing Table Start ===== -->
     
       


        </div>
      
     


        </div>
        <!-- Section Title End -->

        
                      
                        
              
              <!-- If we need navigation -->
              <div class="tc wf xf fg jb">
                <div
                  class="swiper-button-prev c tc wf xf ie ld rg _g dh pf ml vr hh rm tl zm rl ym"
                >
                  <svg class="th lm" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M3.52366 7.83336L7.99366 12.3034L6.81533 13.4817L0.333663 7.00002L6.81533 0.518357L7.99366 1.69669L3.52366 6.16669L13.667 6.16669L13.667 7.83336L3.52366 7.83336Z"
                      fill=""
                    />
                  </svg>
                </div>
                <div
                  class="swiper-button-next c tc wf xf ie ld rg _g dh pf ml vr hh rm tl zm rl ym"
                >
                  <svg class="th lm" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.4763 6.16664L6.00634 1.69664L7.18467 0.518311L13.6663 6.99998L7.18467 13.4816L6.00634 12.3033L10.4763 7.83331H0.333008V6.16664H10.4763Z" fill="" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Testimonials End ===== -->

      <!-- ===== Counter Start ===== -->
   
        <!-- Section Title End -->

        <div class="bb ye ki xn vq jb jo">
          <div class="wc qf pn xo zf iq">
            <!-- Blog Item -->
            <div class="animate_top sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="images/2.jpg" alt="Blog" />

                <div
                  class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10"
                >
                  <a href="#" class="vc ek rg lk gh sl ml il gi hi"
                    >Read More</a
                  >
                </div>
              </div>

              <div class="yh">
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                  </div>
                  <div class="tc wf ag">
                    
                   
                  </div>
                </div>
                <h4 class="ek tj ml il kk wm xl eq lb">
                 
                </h4>
              </div>
            </div>

            <!-- Blog Item -->
            <div class="animate_top sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="images/1.jpg" alt="Blog" />

                <div
                  class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10"
                >
                  <a href="#" class="vc ek rg lk gh sl ml il gi hi"
                    >Read More</a
                  >
                </div>
              </div>

              <div class="yh">
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                  </div>
                  <div class="tc wf ag">
                
                  
                    
                  </div>
                </div>
                <h4 class="ek tj ml il kk wm xl eq lb">
            
                </h4>
              </div>
            </div>

            <!-- Blog Item -->
            <div class="animate_top sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="images/blog.jpg" alt="Blog" />

                <div
                  class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10"
                >
                  <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi"
                    >Read More</a
                  >
                </div>
              </div>

              <div class="yh">
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                    
                 
                  </div>
                  <div class="tc wf ag">
                  
                  
                  </div>
                </div>
                <h4 class="ek tj ml il kk wm xl eq lb">
                 
                </h4>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Blog End ===== -->

      <!-- ===== Contact Start ===== -->
      <section id="support" class="i pg fh rm ji gp uq">
        <!-- Bg Shapes -->
        <img src="images/shape-06.svg" alt="Shape" class="h aa y" />
        <img src="images/shape-03.svg" alt="Shape" class="h ca u" />
        <img src="images/shape-07.svg" alt="Shape" class="h w da ee" />
        <img src="images/shape-12.svg" alt="Shape" class="h p s" />
        <img src="images/shape-13.svg" alt="Shape" class="h r q" />

        <!-- Section Title Start -->
        <div
          x-data="{ sectionTitle: `Let’s Stay Connected`, sectionTitleText: `It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using.`}"
        >
          <div class="animate_top bb ze rj ki xn vq">
    <h2
            x-text="sectionTitle"
            class="fk vj pr kk wm on/5 gq/2 bb _b"
    >
    </h2>
    <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
</div>


        </div>
        <!-- Section Title End -->

        <div class="i va bb ye ki xn wq jb mo">
          <div class="tc uf sn tf rn un zf xl:gap-10">
            <div class="animate_top w-full mn/5 to/3 vk sg hh sm yh rq i pg">
              <!-- Bg Shapes -->
              <img src="images/shape-03.svg" alt="Shape" class="h la x wd" />
              <img src="images/shape-06.svg" alt="Shape" class="h la ma ne kf" />

              <div class="fb">
                <h4 class="wj kk wm cc">Adresse Mail</h4>
                <p><a href="#">PE.mahdia@apii.tn</a></p>
              </div>
              <div class="fb">
                <h4 class="wj kk wm cc">Emplacement officiel</h4>
                <p>Avenue lmourouj Hiboun Mahdia.</p>
              </div>
              <div class="fb">
                <h4 class="wj kk wm cc">Numero du télephone</h4>
                <p><a href="#">+216 70 162 943</a></p>
              </div>
              <div class="fb">
                <h4 class="wj kk wm cc">Adresse mail </h4>
                <p><a href="#">PE.mahdia@apii.tn</a></p>
              </div>

              <span class="rc nd rh tm lc fb"></span>

              <div>
                <h4 class="wj kk wm qb">Social Media</h4>
                <ul class="tc wf fg">
                  <li>
                    <a href="https://www.facebook.com/profile.php?id=100066957346667" class="c tc wf xf ie ld rg ml il tl">
                      <svg class="th lm ml il" width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M6.83366 11.3752H9.12533L10.042 7.7085H6.83366V5.87516C6.83366 4.931 6.83366 4.04183 8.667 4.04183H10.042V0.96183C9.74316 0.922413 8.61475 0.833496 7.42308 0.833496C4.93433 0.833496 3.16699 2.35241 3.16699 5.14183V7.7085H0.416992V11.3752H3.16699V19.1668H6.83366V11.3752Z"
                          fill=""
                        />
                      </svg>
                    </a>
                  </li>
                   <li>
                    <a href="https://www.facebook.com/RNPE.APII" class="c tc wf xf ie ld rg ml il tl">
                      <svg class="th lm ml il" width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M6.83366 11.3752H9.12533L10.042 7.7085H6.83366V5.87516C6.83366 4.931 6.83366 4.04183 8.667 4.04183H10.042V0.96183C9.74316 0.922413 8.61475 0.833496 7.42308 0.833496C4.93433 0.833496 3.16699 2.35241 3.16699 5.14183V7.7085H0.416992V11.3752H3.16699V19.1668H6.83366V11.3752Z"
                          fill=""
                        />
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="animate_top w-full nn/5 vo/3 vk sg hh sm yh tq">
    <form
  action="https://formspree.io/f/mwpqddgb"
  method="POST"
  class="contact-form"
>
  <label>
    Your email:
    <input type="email" name="email" required>
  </label>
  <label>
    Your message:
    <textarea name="message" rows="5" required></textarea>
  </label>
  <button type="submit">Send</button>
</form>

<style>
  .contact-form {
    max-width: 400px;
    margin: 40px auto;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
  }

  .contact-form label {
    display: block;
    margin-bottom: 15px;
    font-weight: bold;
    color: #333;
  }

  .contact-form input,
  .contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    transition: border 0.3s ease, box-shadow 0.3s ease;
  }

  .contact-form input:focus,
  .contact-form textarea:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 6px rgba(76,175,80,0.4);
    outline: none;
  }

  .contact-form button {
    display: inline-block;
    background: black;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background 0.3s ease;
    width: 100%;
  }

  .contact-form button:hover {
    background:#0000FF;
  }
</style>
            </div>
          </div>
        </div>
      </section>
  

  <script>
    document.getElementById("contactForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(this);
      const data = Object.fromEntries(formData.entries());

      fetch("http://localhost:3000/send-email", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
      }).then(res => res.json())
        .then(resp => alert(resp.message))
        .catch(err => alert("Erreur: " + err));
    });
  </script>
      <!-- ===== Contact End ===== -->

      <!-- ===== CTA Start ===== -->
     

      <!-- ===== CTA End ===== -->
    </main>
    <!-- ===== Footer Start ===== -->
  
       
    <!-- Footer Top -->

    <!-- Footer Bottom -->
    <div class="bh ch pm tc uf sf yo wf xf ap cg fp bj">
      <div class="animate_top">
        <ul class="tc wf gg">
          <li><a href="#" class="xl">English</a></li>
          <li><a href="#" class="xl">Privacy Policy</a></li>
          <li><a href="#" class="xl">Support</a></li>
        </ul>
      </div>

      <div class="animate_top">
        <p>&copy; 2025 Base. All rights reserved</p>
      </div>
    </div>
    <!-- Footer Bottom -->
  </div>
</footer>

    <!-- ===== Footer End ===== -->

    <!-- ====== Back To Top Start ===== -->
    <button
  class="xc wf xf ie ld vg sr gh tr g sa ta _a"
  @click="window.scrollTo({top: 0, behavior: 'smooth'})"
  @scroll.window="scrollTop = (window.pageYOffset > 50) ? true : false"
  :class="{ 'uc' : scrollTop }"
>
  <svg class="uh se qd" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
  </svg>
</button>

    <!-- ====== Back To Top End ===== -->

    <script>
      //  Pricing Table
      const setup = () => {
        return {
          isNavOpen: false,

          billPlan: 'monthly',

          plans: [
            {
              name: 'Starter',
              price: {
                monthly: 29,
                annually: 29 * 12 - 199,
              },
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },
            {
              name: 'Growth Plan',
              price: {
                monthly: 59,
                annually: 59 * 12 - 100,
              },
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },
            {
              name: 'Business',
              price: {
                monthly: 139,
                annually: 139 * 12 - 100,
              },
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },
          ],
        };
      };
    </script>
  <script defer src="bundle.js"></script></body>
</html>
