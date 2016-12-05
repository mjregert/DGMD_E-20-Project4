<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //---------------------------------------------------------------------------//
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.create');
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
        # Validate the request data
        $this->validate($request, [
            'userCount' => 'required|numeric|min:1|max:9',
        ]);

        $numberUsers = $request->userCount;
        $includeEmailAddress = isset($request->includeEmailAddress) && $request->includeEmailAddress == "on";
        $includeProfile = isset($request->includeProfile) && $request->includeProfile == "on";

        # Read the names list from an external file into an array
        $firstnameList = file("firstnames.txt");
        $lastnameList = file("lastnames.txt");

        # Although the array was already shuffled when read in, use array_rand to get random names
        if ($numberUsers == 1) {
            $firstnameKeys = array(array_rand($firstnameList, $numberUsers));
            $lastnameKeys = array(array_rand($lastnameList, $numberUsers));
        } else {
            $firstnameKeys = array_rand($firstnameList, $numberUsers);
            $lastnameKeys = array_rand($lastnameList, $numberUsers);
        }


        //DOES NOT WORK ON DO - $initialcon = new \Initialcon();

        $output = '';

        for ($i=0; $i<$numberUsers; $i++) {
            # Get the name at key
            $firstname = trim($firstnameList[$firstnameKeys[$i]]);
            $lastname = trim($lastnameList[$lastnameKeys[$i]]);
            $initials = $firstname[0].$lastname[0];
            //DOES NOT WORK ON DO - $imageDataUri = $initialcon->getImageDataUri($initials, '');

            //DOES NOT WORK ON DO - $output .= '<p><img src="'.$imageDataUri.'" style="float:left;margin-right:2em;"><b>Name:</b> '.$firstname.' '.$lastname.'<br>';
            $output .= '<p><b>Name:</b> '.$firstname.' '.$lastname.'<br>';

            if ($includeEmailAddress) {
                $email = strtolower($firstname).'.'.strtolower($lastname).'@yourdomain.com';
                $output .= '<b>Email Address:</b> '.$email.'<br>';
            }
            if ($includeProfile) {
                $profile = \Lipsum::medium()->text(1);
                $output .= '<b>Profile:</b> '.$profile.'</p><br>';
            }
            $output .= '</p><br style="clear:both">';
        }


        /* Return a view and pass back output here */
        return view('user.create')->with('output', $output);
    }
}
