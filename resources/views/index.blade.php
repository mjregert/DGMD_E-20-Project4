@extends('layouts.master')


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
@stop


@section('content')
    <div id="red">
        <div>
            <h2>Lorem Ipsum Generator</h2>
            <p>In publishing and graphic design, lorem ipsum is a placeholder text
            commonly used to demonstrate the graphic elements of a document or
            visual presentation. By replacing the distraction of meaningful
            content with filler text of scrambled Latin it allows viewers to
            focus on graphical elements such as font, typography, and layout.</p>
            <a href="/lorem/create">Create random filler text for your application...</a>
        </div>
    </div>
    <div id="blue">
        <div>
            <h2>Random User Generator</h2>
            <p>Create random user data for your applications. Like Lorem Ipsum, but
                for people.</p>
                <a href="/users/create">Create a random user for your application...</a>
        </div>
    </div>
    <div id="green">
        <div>
            <h2>Random Password Generator</h2>
            <p>Create a random password for your applications. Like Lorem Ipsum, but for passwords.</p>
            <a href="/passwords/create">Create a random password for your application...</a>
        </div>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
