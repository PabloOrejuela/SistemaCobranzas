<header>
    <div class="menu">
        <ul>
            <li class="logo">
                <a href="<?php echo site_url().'/inicio';?>" target="_self">
                    <img height="44" title="CodeIgniter Logo" alt="Sistema de cobranzas" src="<?php echo site_url(); ?>public/img/cashier.svg">
                    <span id="titulo-sistema">Sistema de cobranzas ver. <?= $version; ?></span>
                </a>
            </li>
            <?php
            
                if ($idrol <= 2) {
                    //echo '<li class="menu-item"><a href="'. base_url().'/inicio">Inicio</a></li>'
                    echo '       
                            <li class="menu-item"><a href="'.base_url().'/cartera" target="_self">Cartera</a></li>
                            <li class="menu-item"><a href="'.base_url().'/usuarios" target="_self">Usuarios</a></li>
                            <li class="menu-item"><a href="'. base_url().'/cobros" target="_self">Cobros</a></li>
                            <li class="menu-item"><a href="'. base_url().'/reportes" target="_self">Reportes</a></li>
                            <li class="menu-item"><a href="'. base_url().'/salir" target="_self">Salir</a></li>';
                } elseif ($idrol == 3) {
                    echo '<li class="menu-item"><a href="'. base_url().'/inicio">Inicio</a></li>
                            <li class="menu-item"><a href="#" target="_self">Cobros</a></li>
                            <li class="menu-item"><a href="'. base_url().'/salir" target="_self">Salir</a></li>';
                }
                echo '<li class="menu-item" style="margin-left: 30px;border:1px solid black;padding: 5px;">Bienvenido '.$nombre.'</li>';
            ?>
            
        </ul>
    </div>
</header>