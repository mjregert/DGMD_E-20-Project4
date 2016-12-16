$(document).ready(function() {

    //******** NEW JQUERY-UI WIDGET ************
    // Pop up a "Thank you" dialog box
    $( "#thanks" ).dialog();

    //******** NEW JQUERY-UI INTERACTION ************
    $("#formContainer").resizable();

    var avatars = ["img/avatar1.png","img/avatar2.png","img/avatar3.png","img/avatar4.png","img/avatar5.png","img/avatar6.png"];
    var selectedAvatar = 0;

    // If the browser does not support the HTML5 "date" type of input, add a JQuery datepicker
    $( function() {
        if ($('#dob').prop('type') != 'date') {
            $( "#dob" ).datepicker();
        }
    }); // end annyomous function for DPB picker

    //------------------------------------------------------------------------//
    //******** NEW JQUERY-UI EFFECT ************
    // Click event handler for the subscribe checkbox
    $('#subscribe').on("click", function() {
        // When the user selects the "subscribe" checkbox, show the genre selection pane
        $( "#genreFieldSet" ).toggle( "bounce", "swing", 800, function() {
            // On complete of the toggle, change the background color to light blue, the text to black
            $(this).css({'backgroundColor' : 'lightblue'});
            $(this).css({'color' : 'black'});
        });
    });

    //------------------------------------------------------------------------//
    // Click event handler for the submit checkbox
    $('#submit').click(function() {
        alert("Account created!");
    }); // End submit click

    //------------------------------------------------------------------------//
    // Hover event handlers for the arrows
    $('#leftArrow').hover(function() {
        $( this ).css({'opacity' : '1.0'});
    }, function() {
        $( this ).css({'opacity' : '0.4'});
    });

    $('#rightArrow').hover(function() {
        $( this ).css({'opacity' : '1.0'});
    }, function() {
        $( this ).css({'opacity' : '0.4'});
    });

    //------------------------------------------------------------------------//
    // Click event handlers for the arrows
    $('.arrow').first().click(function() {
        selectedAvatar--;
        if (selectedAvatar == -1) {
            selectedAvatar = avatars.length -1;
        }
        $('#avatarImg').fadeOut( "slow", function() {
            $('#avatarImg').attr('src',avatars[selectedAvatar]);
            $('#avatarImg').fadeIn( "slow", function() {
             //Done
            });
        });
    });

    $('.arrow').last().click(function() {
        selectedAvatar++;
        if (selectedAvatar == avatars.length) {
            selectedAvatar = 0;
        }
        $('#avatarImg').fadeOut( "slow", function() {
            $('#avatarImg').attr('src',avatars[selectedAvatar]);
            $('#avatarImg').fadeIn( "slow", function() {
             //Done
            });
        });
    });

    //------------------------------------------------------------------------//
    // Click event for the reset button
    $('#reset').click(function() {
        selectedAvatar = 0;
        $('#avatarImg').attr('src',avatars[selectedAvatar]);
    });

}); // End ready
