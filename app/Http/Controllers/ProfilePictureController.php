<?php
public function show($filename)
{
    $file = Storage::disk('private')->get('profile_pictures/' . $filename);
    return response($file, 200)->header('Content-Type', 'image/jpeg');
}

?>