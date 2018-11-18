<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Quran\Helper\Log;
use Quran\Helper\Request as ApiRequest;

$app->group('/v1', function() {
    // Without edition
    $this->get('/quran', function (Request $request, Response $response) {

        $edition = 'quran-simple';
        $quran = new Quran\Api\CompleteResponse($edition);
        // $this->logger->addInfo('edition ::: ' . time() . ' ::', Log::format($_SERVER, $_REQUEST));

        return $response->withJson($quran->get(), $quran->getCode());
    });

    // With edition
    $this->get('/quran/{edition}', function (Request $request, Response $response) {

        $edition = $request->getAttribute('edition');
        $quran = new Quran\Api\CompleteResponse($edition);
        // $this->logger->addInfo('edition ::: ' . time() . ' ::', Log::format($_SERVER, $_REQUEST));

        return $response->withJson($quran->get(), $quran->getCode());
    });
});
