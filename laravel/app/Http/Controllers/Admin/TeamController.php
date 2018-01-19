<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        $url = 'teams';
        return view('admin.pages.teams.index', ['teams' => $teams, 'url' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teams.create', ['url' => 'teams']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'job_title' => 'required',
            'about' => 'required',
            'pic' => 'required'
        ]);
        $image = $request->file('pic');
        $input['pic'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['pic']);
        Team::create([
            'name' => $request->input('name'),
            'pic' => $input['pic'],
            'job_title' => $request->input('job_title'),
            'about' => $request->input('about'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter')
        ]);
        $request->session()->flash('success', 'Team Member added successfully');
        return redirect(route('teams.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.pages.teams.edit', ['url' => 'teams', 'team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'name' => 'required',
            'job_title' => 'required',
            'about' => 'required'
        ]);
        if ($request->has('pic')) {
            $image = $request->file('pic');
            $input['pic'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $input['pic']);
            Storage::delete('uploads/'.$team->pic);
            $team->pic = $input['pic'];
        }
        $team->name = $request->input('name');
        $team->job_title = $request->input('job_title');
        $team->about = $request->input('about');
        $team->facebook = $request->input('facebook');
        $team->twitter = $request->input('twitter');
        $team->save();
        $request->session()->flash('success', 'Team Member details updated successfully');
        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect(route('teams.index'))->with('success', 'Team Member removed successfully');
    }
}
