<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonObserver
{
    public function creating(Lesson $lesson){
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        if($platform_id == 1){
            $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }elseif($platform_id == 2){
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }elseif ($platform_id == 3) {
            $url =  substr($url, 25);
            $parte = strtok($url, "?");
            $lesson->iframe = '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/'.$parte.'?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        }elseif ($platform_id == 4) {
            $lesson->iframe = '<iframe src="'. $url .'?embedded=true"></iframe>';
        }
    }

    public function updating(Lesson $lesson){
        $url = $lesson->url;
        $platform_id = $lesson->platform_id;

        if($platform_id == 1){
            $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }elseif($platform_id == 2){
            $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            $array = preg_match($patron, $url, $parte);
            $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
        }elseif ($platform_id == 3) {
            $url =  substr($url, 25);
            $parte = strtok($url, "?");
            $lesson->iframe = '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/'.$parte.'?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
        }elseif ($platform_id == 4) {
            $lesson->iframe = '<iframe src="'. $url .'?embedded=true"></iframe>';
        }
    }

    public function deleting(Lesson $lesson)
    {
        if ($lesson->resource) {
            Storage::delete($lesson->resource->url);
            $lesson->resource->delete();
        }
    }
}
