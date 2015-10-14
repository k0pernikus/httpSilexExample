<?php
namespace Kopernikus\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * IndexController
 **/
class IndexController
{
    public function indexAction(Request $request)
    {
        $data = $request->request->get('data');

        if ($data === null) {
            throw new BadRequestHttpException('Data parameter required');
        }

        return new JsonResponse(
            [
                'message' => $data,
            ]
        );
    }
}
