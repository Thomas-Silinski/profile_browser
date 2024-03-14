<?php

namespace App\Http\Controllers;

use App\Models\Star;
use App\Http\Requests\StoreStarRequest;
use App\Http\Requests\UpdateStarRequest;
use App\Services\StarService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\VarDumper\VarDumper;

class StarController extends Controller
{
    /**
     * @var StarService
     */
    public StarService $starService;

    /**
     * @param StarService $starService
     */
    public function __construct(StarService $starService)
    {
        $this->starService = $starService;

        $this->authorizeResource(Star::class);
    }

    /**
     * Display a listing of the star.
     *
     * @return Response
     */
    public function index(): Response
    {
        try {
            return Inertia::render('stars/index', [
                'stars' => $this->starService->index(),
                'can'   => [
                    'create' => Gate::check('create', Star::class),
                ],
            ]);
        } catch (\Error $e) {
            VarDumper::dump($e);
            exit();
        }
    }

    /**
     * Show the form for creating a new star.
     *
     * @return Response
     */
    public function create(): Response
    {
        try {
            return Inertia::render('stars/create', [
                'can' => [
                    'viewAny' => Gate::check('viewAny', Star::class),
                ],
            ]);
        } catch (\Error $e) {
            VarDumper::dump($e);
            exit();
        }
    }

    /**
     * Store a newly created star in storage.
     *
     * @param StoreStarRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreStarRequest $request): RedirectResponse
    {
        try {
            Star::query()->create($request->validated());

            return to_route('stars.index');
        } catch (\Error $e) {
            VarDumper::dump($e);
            exit();
        }
    }

    /**
     * Show the form for editing the specified star.
     *
     * @param Star $star
     *
     * @return Response
     */
    public function edit(Star $star): Response
    {
        try {
            return Inertia::render('stars/edit', [
                'star' => $star,
                'can'  => [
                    'viewAny' => Gate::check('viewAny', Star::class),
                ],
            ]);
        } catch (\Error $e) {
            VarDumper::dump($e);
            exit();
        }
    }

    /**
     * Update the specified star in storage.
     *
     * @param UpdateStarRequest $request
     * @param Star              $star
     *
     * @return RedirectResponse
     */
    public function update(UpdateStarRequest $request, Star $star): RedirectResponse
    {
        try {
            $star->update($request->validated());

            return to_route('stars.index');
        } catch (\Error $e) {
            VarDumper::dump($e);
            exit();
        }
    }

    /**
     * Remove the specified star from storage.
     *
     * @param Star $star
     *
     * @return RedirectResponse
     */
    public function destroy(Star $star): RedirectResponse
    {
        try {
            $star->delete();

            return to_route('stars.index');
        } catch (\Error $e) {
            VarDumper::dump($e);
            exit();
        }
    }
}
