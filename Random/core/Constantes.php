<?php


final class Constantes
{

    const REPERTOIRE_VIEWS       = '/views/';

    const REPERTOIRE_MODEL      = '/model/';

    const REPERTOIRE_CORE      = '/core/';

    const REPERTOIRE_EXCEPTIONS  = '/core/Exceptions/';

    const REPERTOIRE_CONTROLLERS = '/controllers/';


    public static function repertoireRacine() {
        return realpath(__DIR__ . '/../');
    }

    public static function repertoireCore() {
        return self::repertoireRacine() . self::REPERTOIRE_CORE;
    }

    public static function repertoireExceptions() {
        return self::repertoireRacine() . self::REPERTOIRE_EXCEPTIONS;
    }

    public static function repertoireViews() {
        return self::repertoireRacine() . self::REPERTOIRE_VIEWS;
    }

    public static function repertoireModel() {
        return self::repertoireRacine() . self::REPERTOIRE_MODEL;
    }

    public static function repertoireControllers() {
        return self::repertoireRacine() . self::REPERTOIRE_CONTROLLERS;
    }


}