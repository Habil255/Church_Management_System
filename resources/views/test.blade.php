@php
    $names=["Habil", "Ibrahim","Lightness"];
    foreach($names as $name) {
        echo "Hello, {$name} <br>";
    }
    echo "datetime is ".Carbon::now();
@endphp