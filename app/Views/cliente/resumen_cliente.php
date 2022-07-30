<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= esc($title); ?></h1>
                        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <?= esc($title); ?>
                </div>
                <div class="card-body">
                    <h4>Info acá</h4>
                </div>
            </div>
        </div>
    </main>

<script type="text/javascript">
    $(function onChangeActiveInput() {
        $("#idmetodo_pago").change( function() {
            if ($(this).val() === "1") {
                $("#documento").prop("disabled", true);
            } else {
                $("#documento").prop("disabled", false);
            }
        });
    });

    //Contador de caracteres
    const mensaje = document.getElementById('documento');
    const contador = document.getElementById('contador');

    mensaje.addEventListener('input', function(e) {
        const target = e.target;
        const longitudMax = target.getAttribute('maxlength');
        const longitudAct = target.value.length;
        contador.innerHTML = `${longitudAct}/${longitudMax + ' caracteres máximo'}`;
    });
</script>