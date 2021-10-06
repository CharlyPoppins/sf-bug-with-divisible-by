<?php

namespace App\Controller;

use App\Model\MyModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TestController
{
    /**
     * @Route("/test-model", methods={"POST"})
     */
    public function test(Request $request, ValidatorInterface $validator): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $model = new MyModel($data['amount']);

        dump($model);

        $errors = $validator->validate($model);

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                dump($error);
            }

            return new JsonResponse("KO", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse("Model is OK", Response::HTTP_OK);
    }
}
