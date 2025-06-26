<?php
function alerta($mensaje): string{
       return "<div class='alert alert-warning' role='alert'>"
       .htmlspecialchars($mensaje).
       "</div>";
    }
?>