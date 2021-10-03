<?php
$coord = [55.750626, 37.597664];
?>

<div>
Координаты плитки:<br>
<pre>
    <?php var_dump(getTileCoordinates($coord)) ?>
</pre>
</div>

<?php
/**
 * Расчёт координат для плитки
 * @param array $coord координаты (широта, долгода)
 * @return array
 */
function getTileCoordinates(array $coord) : array
{
    $equatorRadius = 6378137;
    $equatorLength = 40075016.685578488;
    $exsen = 0.0818191908426;
    $worldSize = pow(2, 31);

    $latitude = $coord[0] * M_PI / 180;
    $longitude = $coord[1] * M_PI / 180;

    $tanTemp = tan(M_PI / 4 + $latitude / 2);
    $powTemp = pow(tan(M_PI / 4 + asin($exsen * sin($latitude)) / 2), $exsen);

    $a = $worldSize / $equatorLength;
    $b = $equatorLength / 2;

    $tileX = floor(((($b + $equatorRadius * $longitude) * $a) / 256) / pow(2, 4));
    $tileY = floor(((($b - $equatorRadius * log($tanTemp / $powTemp)) * $a) / 256) / pow(2, 4));

    return [$tileX, $tileY];
}
?>
