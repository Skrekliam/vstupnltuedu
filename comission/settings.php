<?php

$link = 3;
require './admin.php';



?>
<div class="container">
    <div class="form-check form-switch">
        <input class="form-check-input fs-1" onclick="trigBig()" type="checkbox" id="big">
        <label class="form-check-label fs-1" for="flexSwitchCheckDefault">Великі таблиці</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input fs-1" onclick="trigBack()" type="checkbox" id="dark">
        <label class="form-check-label fs-1" for="flexSwitchCheckDefault1">Темний фон таблиць</label>
    </div>
</div>


<script>
    window.onload = () => {

        const ls = localStorage;
        if (ls.getItem('tableBack') === 'true') {
            document.querySelector('#dark').checked = 'checked';
        } else {
            document.querySelector('#dark').checked = '';
        }
        if (ls.getItem('tableBig') === 'true') {
            document.querySelector('#big').checked = 'checked';
        } else {
            document.querySelector('#big').checked = '';
        }
    }

    function trigBig() {
        const ls = localStorage;
        if (ls.getItem('tableBig') === 'false') {
            ls.setItem('tableBig', 'true');
        } else {
            ls.setItem('tableBig', 'false');
        }
    }

    function trigBack() {
        const ls = localStorage;
        if (ls.getItem('tableBack') === 'false') {
            ls.setItem('tableBack', 'true');
        } else {
            ls.setItem('tableBack', 'false');
        }
    }
</script>