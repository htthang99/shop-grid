<?php

namespace App\Traits;

trait PaginatorTrait
{
    public function getPerPage()
    {
        // get from request, then session
        $perPage = $this->request->get('per-page', null);
        if (!$perPage) {
            // get from session
            $perPage = session()->get('per-page', null);
            if (!$perPage) {
                // get from config
                $perPage = config('view.page.per-page', 15);
                // udpate session
                session()->set('per-page', $perPage);
            }
        } else {
            // udpate session
            session()->set('per-page', $perPage);
        }

        return $perPage;
    }

    public function getCurrentPage()
    {
        return $this->request->get('page', 1);
    }
}
