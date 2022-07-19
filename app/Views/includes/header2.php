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
                            <li class="menu-item"><a href="'.base_url().'/cartera" target="_self" id="link-item">Cartera</a></li>
                            <li class="menu-item"><a href="'.base_url().'/usuarios" target="_self" id="link-item">Usuarios</a></li>
                            <li class="menu-item"><a href="'. base_url().'/cobros" target="_self" id="link-item">Cobros</a></li>
                            <li class="menu-item"><a href="'. base_url().'/reportes" target="_self" id="link-item">Reportes</a></li>
                            <li class="menu-item"><a href="'. base_url().'/salir" target="_self" id="link-item">Salir</a></li>';
                } elseif ($idrol == 3) {
                    echo '<li class="menu-item"><a href="'. base_url().'/inicio" id="link-item">Inicio</a></li>
                            <li class="menu-item"><a href="#" target="_self" id="link-item">Cobros</a></li>
                            <li class="menu-item"><a href="'. base_url().'/salir" target="_self" id="link-item">Salir</a></li>';
                }
                echo '<li class="menu-item" style="margin-left: 30px;border:1px solid black;padding: 5px;">Usuario: '.$nombre.'</li>';
            ?>
            
        </ul>
    </div>
</header>