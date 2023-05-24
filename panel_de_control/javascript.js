
var rangojs = "<?php echo $_SESSION['rango'] ?>";
document.write(rangojs);
window.onload = function mostrar() {
    if (rangojs == "ADMIN") {
        $clase = document.getElementById('admin');
        $clase = style.display = 'block';

    }else{
    }
}