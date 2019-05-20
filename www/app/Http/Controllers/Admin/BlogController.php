<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    protected $repository;

    public function __construct(BlogRepository $repository)
    {
        $this->middleware('auth');

        $this->repository = $repository;
    }

    public function index()
    {
        $result = $this->repository->list();

        return view('dashboard.blog.list', [
            'result' => $result
        ]);
    }

    public function create()
    {
        //
    }

    public function update($id)
    {
        $result = $this->repository->getByID($id);

        return view('dashboard.blog.update', [
            'result' => $result
        ]);
    }

    public function delete()
    {
        //
    }
}