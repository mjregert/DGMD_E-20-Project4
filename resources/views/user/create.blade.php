@extends('layouts.master') @section('content')

<section>
    <h2>Random User Generator</h2>
    <p>Create random user data for your applications. Like Lorem Ipsum, but for people.</p>


    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif



    <form method='POST' action='/users/create'>
        <fieldset>
            <legend>User Generator Options:</legend>
            <span>
                    <label>Number of Users (min 1, max 9):</label>
                    <input type="number"
                           name="userCount"
                           value="3"
                    />
                </span>
            <br>
            <span>
                    <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                    <input type="checkbox"
                           name="includeEmailAddress"
                    />
                    <label>Include Email Address</label>
                </span>
            <br>
            <span>
                    <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                    <input type="checkbox"
                           name="includeProfile"
                    />
                    <label>Include Profile</label>
                </span>
            <br>
            <span>{{ csrf_field() }}</span>
            <br>
            <span>
                    <label><em>Click submit to generate a random users with the parameters above.</em></label>
                    <input type="submit" value="Submit">
                </span>
        </fieldset>
    </form>
</section>
<section>
    <h2>Results Below</h2> {!! $output or '' !!}
</section>

@include('layouts.subpage')
@stop
