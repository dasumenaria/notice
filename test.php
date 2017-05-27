<?php
$x=dirname(__FILE__);
echo $x;
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

$dist= distance(24.579512, 73.696112, 24.583312, 73.725812, "K");
echo number_format($dist,3);
 
?> [{"latitude":24.5854,"longitude":73.7125},{"latitude":19.0760,"longitude":72.8777}]