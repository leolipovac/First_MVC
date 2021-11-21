<?php
session_start();

    require 'core/ChargementAuto.php';

    $S_urlADecortiquer = isset($_GET['route']) ? $_GET['route'] : null;
    $A_postParams = isset($_POST) ? $_POST : null;

    Vue::ouvrirTampon();
    try
    {
        echo $_GET['route'];
        $O_controleur = new Controleur($S_urlADecortiquer, $A_postParams);
        $O_controleur->executer();
    }
    catch (ControleurException $O_exception)
    {
        echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
    }

    $contenuPourAffichage = Vue::recupererContenuTampon();

    Vue::display('template', array('body' => $contenuPourAffichage));