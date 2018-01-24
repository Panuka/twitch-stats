<?php

/**
 * Created by PhpStorm.
 * User: skif
 * Date: 3/10/17
 * Time: 7:05 PM
 */
class FacebookApi
{
    protected $token = "EAACW5Fg5N2IBAAwzail0NWDRnjjxwLZBZA1nOkYoIpZCZBl5uGJxiSXZALFft6hroYe0WD95BvaZCBYWMxUISNtutZA8HHo9FFbCbAhoSA25puoKZCzWu35cwVfTJinBJffd5g8nUtL2pRPfk4oZC0o0YyP6Bedm40ig7NFi26FKoa99gHCilrQi5";

    public function fb_post_thumbnail($fb_post_id)
    {
        $data = file_get_contents("http://graph.facebook.com/{$fb_post_id}?fields=format");
        $result = json_decode($data);

        if (isset($result)) {
            $data = array(
                'thumbnail_low' => $result->format[0]->picture,
                'thumbnail_middle' => $result->format[1]->picture,
                'thumbnail_large' => $result->format[2]->picture,
                'thumbnail_native' => $result->format[3]->picture
            );

            return $data;
        }
            return null;
    }

    public function fb_post_insights($fb_post_id)
    {
        $page_id = json_decode(file_get_contents("https://graph.facebook.com/{$fb_post_id}?fields=from&$this->token"));
        $data = json_decode(file_get_contents("https://graph.facebook.com/v2.8/{$page_id->from->id}_{$fb_post_id}/insights/post_video_views?access_token=$this->token"), true);;

        return $data;
    }

    public function fb_post_engagement($fb_post_id)
    {
        $data = json_decode(file_get_contents("https://graph.facebook.com/{$fb_post_id}?fields=likes.limit(0).summary(true),comments.limit(0).summary(true),from&access_token=$this->token"));
        $shares = json_decode(file_get_contents("https://graph.facebook.com/{$data->from->id}_{$fb_post_id}"));

        $data = array(
            'likes' => $data->likes->summary->total_count,
            'shares' => $shares->shares->count,
            'comments' => $data->comments->summary->total_count,
        );

        return $data;
    }

    public function fb_post_link($fb_post_id)
    {
        $link = "https://facebook.com/{$fb_post_id}";
        return $link;
    }
}

$fb_post_id = "1434424266800987";
$t = new FacebookApi();
print_r($t->fb_post_insights($fb_post_id));
