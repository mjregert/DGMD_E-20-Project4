@extends('layouts.master')

@section('content')
    <section>
        <h2>Random Password Generator</h2>
        <p>Create a random password for your applications. Like Lorem Ipsum, but for passwords.</p>


        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif



        <form method='POST' action='/passwords/create'>
            <fieldset>
                <legend>Password Generator Options:</legend>
                <span>
                    <label>Number of Words (min 1, max 9):</label>
                    <input type="number"
                           name="wordCount"
                           value="4"
                    />
                </span>
                <br>
                <span>
                    <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                    <input type="checkbox"
                           name="includeNumber"
                    />
                    <label>Include a Number</label>
                </span>
                <br>
                <span>
                    <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                    <input type="checkbox"
                           name="includeSymbol"
                    />
                    <label>Include a Symbol</label>
                </span>
                <span>{{ csrf_field() }}</span>
                <br>
                <br>
                <span>
                    <label><em>Click submit to generate a random password with the parameters above.</em></label>
                    <input type="submit" value="Submit">
                </span>
          </fieldset>
        </form>
    </section>
    <section>
        <h2>Results Below</h2>
        {!! $output or '' !!}
    </section>

    @include('layouts.subpage')
@stop
