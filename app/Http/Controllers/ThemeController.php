<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemeRequest;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function index()
    {
//        $themes = DB::table('themes')->orderBy('id', 'DESC')->paginate(5);
//        $themes = Theme::orderBy('id', 'DESC')->paginate(5);
        $themes = Theme::orderBy('id', 'DESC')->get();
//        dd($themes);
        return view('welcome', compact('themes'));
    }

    public function addTheme(ThemeRequest $request)
    {
//        dd($request);
        $validated = $request->validated();

        $theme = new Theme();
        $theme->name = $request->name;
        $theme->body = $request->body;
        $theme->save();

//        return response()->json(['data' => $validated]);
//        return back()->with('theme_created', 'Theme has been created successfully');
        return response()->json(['newTheme' => $theme, 'validated' => $validated]);
    }

    public function delTheme($id)
    {
//        dd($id);
//        dd('TEST');

//        $theme = Theme::find($id);
//        $theme->delete();

        Theme::destroy($id);
        return back()->with('theme_deleted', 'Theme has been deleted successfully');
    }

    public function editTheme(ThemeRequest $request)
    {
//        dd('name'.$request->name);
//        dd('body'.$request->body);
//        dd($request);
//        $validated = $request->validated();
//        dd($request->id);
//        $theme = Theme::find($request->id);
//        $theme->name = $request->name;
//        $theme->body = $request->body;
//        dd($request);
//        dd($theme);
//        $theme->save();
//        dd($request->all());
//        dd($request->input('name'));
        $update = Theme::where('id', $request->input('id'))->update(['name' => $request->input('name'), 'body' => $request->input('body')]);
//        dd($update);
//
//        return back()->with('theme_updated', 'Theme has been updated successfully');
        return response()->json(['data' => $update]);
    }
}
