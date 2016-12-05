<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoremController extends Controller
{
    //---------------------------------------------------------------------------//
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lorem.create');
    }

    //---------------------------------------------------------------------------//
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'paragraphCount' => 'required|numeric|min:1|max:9',
            'paragraphLength' => 'required',
        ]);

        $numberParagraphs = $request->paragraphCount;

        $output = '';
        switch ($request->paragraphLength) {
            case 'short':
                $output .= \Lipsum::short()->html($numberParagraphs);
                break;

            case 'medium':
                $output .= \Lipsum::medium()->html($numberParagraphs);
                break;

            case 'long':
                $output .= \Lipsum::long()->html($numberParagraphs);
                break;
            case 'verylong':
                $output .= \Lipsum::verylong()->html($numberParagraphs);
                break;
            default:
                # Should never get here due to the above validation, but filling in for completeness
                $output .= \Lipsum::medium()->html($numberParagraphs);
                break;
        }
        /* Return a view and pass back output here */
        return view('lorem.create')->with('output', $output);
    }
}
