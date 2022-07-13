<header>
    <div class="menu">
        <ul>
            <li class="logo">
                <a href="<?php echo site_url();?>" target="_self">
                    <img height="44" title="CodeIgniter Logo" alt="Sistema de cobranzas" src="<?php echo site_url(); ?>public/img/cashier.svg">
                </a>
            </li>
            <li class="menu-item hidden"><a href="<?php echo base_url();?>">Inicio</a></li>
            <li class="menu-item hidden"><a href="<?php echo base_url().'/cartera';?>" target="_self">Cartera</a></li>
            <li class="menu-item hidden"><a href="#" target="_self">Cobros</a></li>
        </ul>
    </div>

    <div class="heroe">

        <h1>Sistema de cobranzas ver. <?= $version; ?></h1>
        <h2>Algún subtitulo</h2>
    </div>
</header>