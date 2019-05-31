<?php

namespace App\Http\Controllers\Admin;

use App\ManageLive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreManageLivesRequest;
use App\Http\Requests\Admin\UpdateManageLivesRequest;

class ManageLivesController extends Controller
{
    /**
     * Display a listing of ManageLive.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('manage_live_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('manage_live_delete')) {
                return abort(401);
            }
            $manage_lives = ManageLive::onlyTrashed()->get();
        } else {
            $manage_lives = ManageLive::all();
        }

        return view('admin.manage_lives.index', compact('manage_lives'));
    }

    /**
     * Show the form for creating new ManageLive.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('manage_live_create')) {
            return abort(401);
        }
        return view('admin.manage_lives.create');
    }

    /**
     * Store a newly created ManageLive in storage.
     *
     * @param  \App\Http\Requests\StoreManageLivesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManageLivesRequest $request)
    {
        if (! Gate::allows('manage_live_create')) {
            return abort(401);
        }
        $manage_live = ManageLive::create($request->all());



        return redirect()->route('admin.manage_lives.index');
    }


    /**
     * Show the form for editing ManageLive.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('manage_live_edit')) {
            return abort(401);
        }
        $manage_live = ManageLive::findOrFail($id);

        return view('admin.manage_lives.edit', compact('manage_live'));
    }

    /**
     * Update ManageLive in storage.
     *
     * @param  \App\Http\Requests\UpdateManageLivesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManageLivesRequest $request, $id)
    {
        if (! Gate::allows('manage_live_edit')) {
            return abort(401);
        }
        $manage_live = ManageLive::findOrFail($id);
        $manage_live->update($request->all());



        return redirect()->route('admin.manage_lives.index');
    }


    /**
     * Display ManageLive.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('manage_live_view')) {
            return abort(401);
        }
        $manage_live = ManageLive::findOrFail($id);

        return view('admin.manage_lives.show', compact('manage_live'));
    }


    /**
     * Remove ManageLive from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('manage_live_delete')) {
            return abort(401);
        }
        $manage_live = ManageLive::findOrFail($id);
        $manage_live->delete();

        return redirect()->route('admin.manage_lives.index');
    }

    /**
     * Delete all selected ManageLive at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('manage_live_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ManageLive::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ManageLive from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('manage_live_delete')) {
            return abort(401);
        }
        $manage_live = ManageLive::onlyTrashed()->findOrFail($id);
        $manage_live->restore();

        return redirect()->route('admin.manage_lives.index');
    }

    /**
     * Permanently delete ManageLive from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('manage_live_delete')) {
            return abort(401);
        }
        $manage_live = ManageLive::onlyTrashed()->findOrFail($id);
        $manage_live->forceDelete();

        return redirect()->route('admin.manage_lives.index');
    }
}
