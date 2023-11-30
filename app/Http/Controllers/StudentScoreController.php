<?php

namespace App\Http\Controllers;

use App\Models\StudentScore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = StudentScore::all();

        return view('contents.student-score.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('contents.student-score.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'  => 'required',
            'class' => 'required',
            'task1' => 'required|integer',
            'task2' => 'required|integer',
            'task3' => 'required|integer',
            'task4' => 'required|integer',
            'task5' => 'required|integer',
            'test1' => 'required|integer',
            'test2' => 'required|integer'
        ]);

        $countTask = $request->task1 + $request->task2 + $request->task3 + $request->task4 + $request->task5;
        $countTest = $request->test1 + $request->test2;
        $countScore = (($countTask * 60) / 100) + (($countTest * 40) / 100);

        if ($countScore <= 100 && $countScore >= 81) {
            $score = "A";
        } else if ($countScore <= 80 && $countScore >= 71) {
            $score = "B";
        } else if ($countScore <= 70 && $countScore >= 61) {
            $score = "C";
        } else if ($countScore <= 60 && $countScore >= 51) {
            $score = "D";
        } else if ($countScore <= 50 && $countScore >= 0) {
            $score = "E";            
        }

        StudentScore::create([
            'name' => $request->name,
            'class' => $request->class,
            'task_score' => json_encode([
                $request->task1,
                $request->task2,
                $request->task3,
                $request->task4,
                $request->task5
            ]),
            'test_score' => json_encode([
                $request->test1,
                $request->test2
            ]),
            'count_score' => $countScore,
            'score' => $score
        ]);

        return redirect()->back()->with('status', 'student-score-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentScore $studentScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentScore $studentScore): View
    {
        return view('contents.student-score.edit', compact('studentScore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentScore $studentScore): RedirectResponse
    {
        $request->validate([
            'name'  => 'required',
            'class' => 'required',
            'task1' => 'required|integer',
            'task2' => 'required|integer',
            'task3' => 'required|integer',
            'task4' => 'required|integer',
            'task5' => 'required|integer',
            'test1' => 'required|integer',
            'test2' => 'required|integer'
        ]);

        $countTask = $request->task1 + $request->task2 + $request->task3 + $request->task4 + $request->task5;
        $countTest = $request->test1 + $request->test2;
        $countScore = (($countTask * 60) / 100) + (($countTest * 40) / 100);

        if ($countScore <= 100 && $countScore >= 81) {
            $score = "A";
        } else if ($countScore <= 80 && $countScore >= 71) {
            $score = "B";
        } else if ($countScore <= 70 && $countScore >= 61) {
            $score = "C";
        } else if ($countScore <= 60 && $countScore >= 51) {
            $score = "D";
        } else if ($countScore <= 50 && $countScore >= 0) {
            $score = "E";            
        }

        $studentScore->update([
            'name' => $request->name,
            'class' => $request->class,
            'task_score' => json_encode([
                $request->task1,
                $request->task2,
                $request->task3,
                $request->task4,
                $request->task5
            ]),
            'test_score' => json_encode([
                $request->test1,
                $request->test2
            ]),
            'count_score' => $countScore,
            'score' => $score
        ]);

        return redirect()->back()->with('status', 'student-score-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentScore $studentScore): RedirectResponse
    {
        $studentScore->delete();

        return redirect()->back();
    }
}
