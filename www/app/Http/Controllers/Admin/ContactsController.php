<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactsRepository;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    protected $repository;

    public function __construct(ContactsRepository $repository)
    {
        $this->middleware('auth');

        $this->repository = $repository;
    }

    public function index()
    {
        $result = $this->repository->list();

        return view('dashboard.contacts.list', [
            'result' => $result
        ]);
    }

    public function show($id)
    {
        $result = $this->repository->getByID($id);

        return view('dashboard.contacts.show', [
            'result' => $result
        ]);
    }

    public function reply(Request $request)
    {
        // TODO send email reply
        return redirect()->route('contacts.list');
    }

    public function changeStatus($id)
    {
        $this->repository->changeStatus($id);

        return redirect()->route('contacts.list');
    }

    public function delete($id)
    {
        $this->repository->destroy($id);

        return redirect()->route('contacts.list');
    }
}