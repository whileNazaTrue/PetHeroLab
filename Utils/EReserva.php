<?php
namespace Utils;


enum EReserva : string {
    case Pendiente = "Pendiente";
    case Confirmado = "Confirmado";
    case Curso = "En Curso";
    case Rechazado  = "Rechazado";
    case Completo = "Completo";
    case Calificada = "Calificada"; // aca seria calificado chequear en comprobaciones
}

?>