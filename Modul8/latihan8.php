<?php

// data kelas dengan array 2 dimensi
$array = array(
    "1A" => array("mendysia", "anggita", "putri"),
    "1D" => array("reva", "adinta", "nasyiah")
);
// menampilkan data array
print_r($array);
// menampilkan kelas 1A
print_r($array['1A']);
// menampilkan kelas 1d dengan index 0
echo $array['1D'][0];
// tampilkan adinta
echo $array['1D'][1];
// tampilkan putri
echo $array['1A'][2];

// data kelas bisa dituliis juga dengan
$array_simple = [
    "1A" => ["mendysia", "anggita", "putri"],
    "1D" => ["reva", "adinta", "nasyiah"]
];
?>