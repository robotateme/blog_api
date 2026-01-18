<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Content\ContentService;
use App\Services\Content\Contracts\ContentServiceInterface;
use Illuminate\Http\JsonResponse;

class ContentController extends Controller
{
    /**
     * @param ContentService $contentService
     */
    public function __construct(private readonly ContentServiceInterface $contentService)
    {
    }

    public function index(): JsonResponse
    {
        return new JsonResponse([
            'success' => true,
            'data' => $this->contentService->getContent()
        ]);
    }
}
