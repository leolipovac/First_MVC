<?php

require 'core/Constantes.php';

final class ChargementAuto
{
    public static function chargerClassesCore($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireCore() . "$S_nomDeClasse.php";
        return static::_charger($S_fichier);
    }

    public static function chargerClassesException ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireExceptions() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }

    public static function chargerClassesModel ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireModel() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }


    public static function chargerClassesViews ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireViews() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }

    public static function chargerClassesControllers ($S_nomDeClasse)
    {
        $S_fichier = Constantes::repertoireControllers() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }
    private static function _charger ($S_fichierACharger)
    {
        if (is_readable($S_fichierACharger))
        {
            require $S_fichierACharger;
        }
    }
}

// J'empile tout ce beau monde comme j'ai toujours appris à le faire...
spl_autoload_register('ChargementAuto::chargerClassesCore');
spl_autoload_register('ChargementAuto::chargerClassesException');
spl_autoload_register('ChargementAuto::chargerClassesModel');
spl_autoload_register('ChargementAuto::chargerClassesViews');
spl_autoload_register('ChargementAuto::chargerClassesControllers');
