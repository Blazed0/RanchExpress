<?php
function alerta($mensaje){
       return "<div class='alert alert-warning' role='alert'>"
       .htmlspecialchars($mensaje).
       "</div>";
    }
?>