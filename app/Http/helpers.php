<?php 

function cleanString($text)
{
    $utf8 = array(
        '/[áàâãªä]/u'   =>   'a',
        '/[ÁÀÂÃÄ]/u'    =>   'A',
        '/[ÍÌÎÏ]/u'     =>   'I',
        '/[íìîï]/u'     =>   'i',
        '/[éèêë]/u'     =>   'e',
        '/[ÉÈÊË]/u'     =>   'E',
        '/[óòôõºö]/u'   =>   'o',
        '/[ÓÒÔÕÖ]/u'    =>   'O',
        '/[úùûü]/u'     =>   'u',
        '/[ÚÙÛÜ]/u'     =>   'U',
        '/ç/'           =>   'c',
        '/Ç/'           =>   'C',
        '/ñ/'           =>   'n',
        '/Ñ/'           =>   'N',
        '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
        '/[“”«»„]/u'    =>   ' ', // Double quote
        '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
    );
    return preg_replace(array_keys($utf8), array_values($utf8), $text);
}

function digito_verificador($ci, $baseMax = 11)
{
    $resultado = 0;
    $index = 0;
    $r = 0;
    for ($rucIndex = strlen($ci) - 1; $rucIndex >= 0; $rucIndex--) {
        $resultado += (int) $ci[$rucIndex] * ($index + 2);
        $r = $resultado % $baseMax;
        $index++;
    };
    $verificador = $r > 1 ? $baseMax - $r : 0;

    return $verificador;
}

function cached_asset($path, $bustQuery = true)
{
    // Get the full path to the asset.
    $realPath = public_path($path);

    if ( ! file_exists($realPath)) {
        throw new LogicException("File not found at [{$realPath}]");
    }

    // Get the last updated timestamp of the file.
    $timestamp = filemtime($realPath);

    if ( ! $bustQuery) {
        // Get the extension of the file.
        $extension = pathinfo($realPath, PATHINFO_EXTENSION);

        // Strip the extension off of the path.
        $stripped = substr($path, 0, -(strlen($extension) + 1));

        // Put the timestamp between the filename and the extension.
        $path = implode('.', array($stripped, $timestamp, $extension));
    } else {
        // Append the timestamp to the path as a query string.
        $path  .= '?' . $timestamp;
    }

    return asset($path);
}

function activeRoutes(Array $routes, $output = 'active')
{
    return in_array(request()->route()->getName(), $routes) ? $output : '';
}

function showOptions(Array $routes, $output = 'show')
{
    return in_array(request()->route()->getName(), $routes) ? $output : '';
}

?>