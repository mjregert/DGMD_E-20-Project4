@extends('layouts.master')

@section('content')
    <section>
        <h2>Random Text Generator</h2>
        <p>Create random filler text for your application.</p>


        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif



        <form method='POST' action='/lorem/create'>
            <fieldset>
                <legend>Text Generator Options:</legend>
                <label>Average length of a paragraph:</label><br>
                <span>
                    <input type="radio"
                           name="paragraphLength"
                           value="short"
                    />
                    <label style="margin-right: 2em;">Short</label>
                    <br>
                    <input type="radio"
                           name="paragraphLength"
                           value="medium"
                    />
                    <label style="margin-right: 2em;">Medium</label>
                    <br>
                    <input type="radio"
                           name="paragraphLength"
                           value="long"
                    />
                    <label>Long</label>
                    <br>
                    <input type="radio"
                           name="paragraphLength"
                           value="verylong"
                    />
                    <label>Very Long</label>
                    <br>
                </span>
                <span>
                    <label>Number of Paragraphs (min 1, max 9):</label>
                    <input type="number"
                           name="paragraphCount"
                           value="4"
                    />
                </span>
                <span>{{ csrf_field() }}</span>
                <br>
                <br>
                <span>
                    <label><em>Click submit to generate random text with the parameters above.</em></label>
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
