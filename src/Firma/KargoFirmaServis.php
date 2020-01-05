<?php
namespace KargoApi\Firma;

interface KargoFirmaServis
{
    public function setVariable($name, $var);
    public function getHtml($template);
}
