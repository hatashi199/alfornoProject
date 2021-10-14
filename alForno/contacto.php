<?php
    require "includes/cabecera.php";
?>

<div class="xs100 flex xs_jcCenter pTop60 pBottom60" id="contacto">
    <div class="centrado flex xs_fCol xs_aiStart m_filaWrap m_jcSpabet">
        <div class="xs100 m40 flex xs_fCol xs_aistart">
            <h3 class="txNegro mBottom20">Contacto</h3>
            <div class="xs100 flex xs_fCol xs_aiStart mBottom20">
                <span class="tel">986541284</span>
                <span class="tel2">651423854</span>
            </div>
            <div class="xs100 flex xs_fCol xs_aiStart mBottom20">
                <span class="dir"> Rúa Castor Sánchez, 4, 36600 Vilagarcía de Arousa</span>
                <span class="email">al_fornoItalia@gmail.com</span>
            </div>
        </div>

        <script>
            $(function(){
                var map = L.map('mapid').setView([42.597867, -8.763940], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                L.marker([42.597867, -8.763940]).addTo(map);
            })
        </script>
        
        <div id="mapid" class="xs100 m55"></div>
    </div>
</div>

<?php
    require "includes/pie.php";
?>