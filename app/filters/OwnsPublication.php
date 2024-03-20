<?php

namespace app\filters;

#[\Attribute]
class OwnsPublication implements \app\core\AccessFilter
{
    public function redirected()
    {
        $publicationId = $_REQUEST['publication_id'] ?? null;
        $profile = (new \app\models\Profile())->fetchProfile($_SESSION['user_id']);
        $publicationModel = new \app\models\Publication();
        $publicationModel->profile_id = $publicationId;
        $publications = $publicationModel->getById();

        $selectedPublication = null;
        foreach ($publications as $pub) {
            if ($pub->id == $publicationId) {
                $selectedPublication = $pub;
                break;
            }
        }

        if ($selectedPublication === null || $selectedPublication->profile_id != $profile->profile_id) {
            return true;
        }

        return false;
    }
}
