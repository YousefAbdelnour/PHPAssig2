<?php

namespace app\filters;

#[\Attribute]
class OwnsPublication implements \app\core\AccessFilter
{
    public function redirected()
    {
        $publicationId = $_GET['id'];
        $profile = (new \app\models\Profile());
        $profile = $profile->fetchProfile($_SESSION['user_id']);
        $publicationModel = new \app\models\Publication();
        $publicationModel->profile_id = $profile->profile_id;
        $publications = $publicationModel->getById();

        $selectedPublication = new \app\models\Publication();
        foreach ($publications as $pub) {
            if ($pub->id == $publicationId) {
                $selectedPublication = $pub;
                break;
            }
        }

        if ($selectedPublication->profile_id != $profile->profile_id) {
            header('location:/Error/publicationNotOwned');
            return true;
        }

        return false;
    }
}
